define([
    'jquery',
    'dvCampus_customerChat_form'
], function ($) {
    'use strict';

    $.widget('dvCampusCustomerChat.sidebar', {
        options: {
            sidebarOpenButton: '.dv-campus-customer-chat-open-button',
            editButton: '#dv-campus-customer-chat-edit-button',
            closeSidebar: '#dv-campus-customer-chat-close-sidebar-button',
            customerChatList: '#dv-campus-customer-chat-list',
            form: '#dv-campus-customer-chat-form'
        },

        /**
         * @private
         */
        _create: function () {
            $(document).on('dvCampus_CustomerChat_openChat.dvCampus_customerChat', $.proxy(this.openChat, this));
            $(this.options.closeSidebar).on('click.dvCampus_customerChat', $.proxy(this.closeChat, this));
            $(this.options.editButton).on('click.dvCampus_customerChat', $.proxy(this.editChat, this));

            $(this.element).show();
        },

        /**
         * @private
         */
        _destroy: function () {
            $(document).off('dvCampus_CustomerChat_openChat.dvCampus_customerChat');
            $(this.options.closeSidebar).off('click.dvCampus_customerChat');
            $(this.options.editButton).off('click.dvCampus_customerChat');
        },

        /**
         * Open Chat sidebar
         */
        openChat: function () {
            $(this.element).addClass('active');
        },

        /**
         * Close Chat sidebar
         */
        closeChat: function () {
            $(this.element).removeClass('active');
            $(this.options.sidebarOpenButton).trigger('dvCampus_CustomerChat_closeChat');
        },

        /**
         * Open popup with the form to edit chat
         */
        editChat: function () {
            $(this.options.form).data('mage-modal').openModal();
        }
    });

    return $.dvCampusCustomerChat.sidebar;
});
