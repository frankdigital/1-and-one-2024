import { SmoothScroller } from './../core/SmoothScroller';
import Lenis from 'lenis';
import { FocusTrap, createFocusTrap } from 'focus-trap';
import { MODAL_CONTAINER, MODAL_PORTAL, MODAL_TRIGGER } from '../selectors';

/**
 * Standardised modal management system
 *
 * *********************
 * MODAL
 * *********************
 *
 * HTML Structure
 * --------------
 *
 * Each modal content needs do be defined as follow:
 *
 * <div class="modal" data-modal-container id="my-unique-modal-id">
 *     <!-- Content of your modal. Needs to be a single DOM node -->
 * </div>
 *
 * Once defined, the script will automatically transform your modal content with the following structure:
 *
 * <div class="modal" id="my-unique-modal-id">
 *     <div class="modal-backdrop"></div>
 *     <div class="modal-wrapper">
 *         <!-- Content of your modal -->
 *         <div class="modal-close_wrapper">
 *             <button class="modal-close" title="Close">
 *                 <span class="modal-close-icon">
 *                     <!-- Icon defined in modalCloseIcon -->
 *                 </span>
 *             </button>
 *         </div>
 *     </div>
 * </div>
 *
 * Events
 * ------
 *
 * When a modal is open or closed, custom events are triggered on the base of the modal.
 * The following events are triggered:
 * modal:active   : Triggered when the modal is open
 * modal:inactive : Triggered when the modal closing animation is triggered
 * modal:closed   : Triggered after the modal closing animation is done and the modal is not displayed
 *
 * You can listen to them as simply as:
 *
 * $('#my-unique-modal-id').on('modal:active', YOUR_EVENT_HANDLER);
 *
 * *********************
 * MODAL TRIGGER
 * *********************
 *
 * HTML Structure
 * --------------
 * In order to trigger a specific modal, you just need to define an element with the following attribute:
 *
 * data-modal-trigger="MODAL_ID"
 *
 * In the case of the example modal before, it would look like:
 *
 * <button data-modal-trigger="my-unique-modal-id">
 *     Open modal
 * </button>
 *
 * Additional Data
 * ---------------
 *
 * In case you need to pass additional data to your modal, you can use the following attribute on your trigger element:
 *
 * data-modal-trigger-data="DATA_TO_PASS_AS_JSON"
 *
 * Please note: the data to pass needs to be encoded as JSON
 *
 * In the case of the example modal before, it would look like:
 *
 * <button
 *     data-modal-trigger="my-unique-modal-id"
 *     data-modal-trigger-data="{&quot;content&quot;: &quot;hello&quot;}"
 * >
 *     Open modal
 * </button>
 *
 * Closing modal
 * -------------
 *
 * You can add a custom modal close button, you just need a button with the class modal-close. Example:
 *
 * <button class="modal-close">Close the modal</button>
 *
 * Programatically closing the modal
 * ---------------------------------
 *
 * You can programatically close the modal by triggering the following event on the modal:
 * modal:close
 *
 * Example:
 *
 * $(myModal).trigger('modal:close');
 *
 */

const triggerAttribute = 'data-modal-trigger';
const triggerDataAttribute = 'data-modal-trigger-data';
const modalActiveClass = 'jw-base-modal--active';
const modalInactiveClass = 'jw-base-modal--inactive';
const $modalTriggers = $(MODAL_TRIGGER);
const $modalPortal = $(MODAL_PORTAL);
const modalCloseIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="jw-icon-handler__icon"><path fill="currentColor" d="M12 13.414 8.465 16.95q-.3.3-.708.3a.97.97 0 0 1-.707-.3q-.3-.3-.3-.707t.3-.707L10.586 12 7.05 8.464q-.3-.3-.3-.707 0-.405.3-.707.3-.3.707-.3t.708.3L12 10.586l3.536-3.536q.3-.3.707-.3t.707.3q.3.3.3.707t-.3.707L13.414 12l3.536 3.536q.3.3.3.707 0 .405-.3.707-.3.3-.707.3a.97.97 0 0 1-.707-.3z"></path></svg>`;
let currentModal: JQuery<HTMLElement> | null = null;
let currentTrigger: JQuery<HTMLElement> | null = null;
const focusTrapMap: Map<string, FocusTrap> = new Map();

export function initModal(scroll: SmoothScroller) {
	const $modalContainerTarget = $(MODAL_CONTAINER);

	if ($modalContainerTarget.length) {
		$modalContainerTarget.each((_index, element) => {
			registerModalContainer(element);

			// load modal if there is the hash in url
			if (
				location.hash &&
				$(element).attr('id') === location.hash.replace('#', '') &&
				!$(element).data().hasOwnProperty('disableHash')
			) {
				handleModalOpen(location.hash.replace('#', ''), $('body'));
			}
		});
		// Add keyboard event listener
		$(document).on('keyup', (e) => {
			if (e.key === 'Escape' && currentModal) {
				handleModalClose(currentModal);
			}
		});
	}
	if ($modalTriggers.length) {
		$modalTriggers.each((_index, element) => {
			registerModalTriggers(element);
		});
	}
}

export function registerModalContainer(element: HTMLElement) {
	// I want to move the HTML structure to the Modal Portal
	const modalPortal = $modalPortal.first();
	const modal = $(element).first();

	const existingModal = modalPortal.find(`#${modal.attr('id')}`);
	if (existingModal.length === 0) {
		modalPortal.append(modal);
	} else {
		console.warn(`Modal with id "${modal.attr('id')}" already exists in the portal`);
		modal.remove();
	}

	// Wrap the element with the modal container
	const modalId = modal.attr('id');

	const modalContent = $(':first-child', modal);
	// Remove the modal container attribute to prevent multiple initialisation
	modal.removeAttr('data-modal-container').addClass('modal');
	// Add the backdrop
	modal.append(`<div class="jw-base-modal__overlay"></div>`);
	// Wrap the modal content
	modalContent.first().wrap(`
        <div class="jw-base-modal__anchor">
            <div class="jw-base-modal__container">
                
                
            </div>
        </div>
    `);

	// Add the close button
	$('.jw-base-modal__type', modal).first().prepend(`
		<button data-modal-close class="jw-base-modal__close" title="Close">
			<span class="jw-icon-handler">
				${modalCloseIcon}
			</span>
		</button>
	`);

	if (modalId) {
		// Instantiate the focus trap
		focusTrapMap.set(
			modalId,
			createFocusTrap(modal[0], {
				allowOutsideClick: true,
				preventScroll: true,
				initialFocus: modal.find('input')[0],
			}),
		);
	}

	// Bind the closing event
	modal.on('click', '[data-modal-close], .jw-base-modal__overlay', () => {
		handleModalClose(modal);
	});
	modal.on('modal:close', () => {
		handleModalClose(modal);
	});
}

export function registerModalTriggers(element: HTMLElement) {
	const trigger = $(element);
	const triggerTarget = trigger.attr(triggerAttribute);
	const modalRawData = trigger.attr(triggerDataAttribute);
	let modalData: any = undefined;

	if (modalRawData) {
		try {
			modalData = JSON.parse(modalRawData);
		} catch (error) {
			console.warn('Error parsing modal trigger data', modalRawData, trigger);
		}
	}

	trigger.on('click', () => {
		if (triggerTarget) {
			handleModalOpen(triggerTarget, trigger, modalData);
		}
	});
}

export function handleModalOpen(modalId: string, srcTrigger: JQuery<HTMLElement>, modalData?: any) {
	const modal = $(`#${modalId}.modal`);

	if (modal.length) {
		currentModal = modal;
		currentTrigger = srcTrigger;

		modal.addClass(modalActiveClass).trigger('modal:active', { trigger: srcTrigger, ...modalData });

		$('body').addClass('no_scroll');

		// Activate the focusTrap
		if (focusTrapMap.has(modalId)) {
			const focusTrap = focusTrapMap.get(modalId);
			if (focusTrap) {
				focusTrap.activate();
			}
		}

		if (!modal.data().hasOwnProperty('disableHash')) {
			history.pushState(null, '', `#${modalId}`);
		}
	} else {
		console.warn(`Modal trigger's target invalid: "${modalId}"`, srcTrigger);
	}
}

function handleModalClose(modal: JQuery<HTMLElement>) {
	if (modal) {
		const modalId = modal.attr('id');
		if (modalId && focusTrapMap.has(modalId)) {
			const focusTrap = focusTrapMap.get(modalId);
			if (focusTrap) {
				focusTrap.deactivate();
			}
		}

		$('body').removeClass('no_scroll');

		modal.removeClass(modalActiveClass).addClass(modalInactiveClass).trigger('modal:inactive');

		const modalCopy = modal.first();

		setTimeout(() => {
			modalCopy.removeClass(modalInactiveClass).trigger('modal:closed');
			$('body').removeClass('no_scroll');
		}, 200);
	}

	if (currentTrigger) {
		// Send the focus back onto the original trigger
		currentTrigger[0].focus();
	}

	// Remove # from URL
	const hashlessHref = location.href.split('#')[0];
	history.pushState('', document.title, hashlessHref);

	if (currentModal && currentModal.attr('id') === modal.attr('id')) {
		currentModal = null;
		currentTrigger = null;
	}
}
