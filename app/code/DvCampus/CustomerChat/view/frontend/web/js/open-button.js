define([
    'jquery',
    'jquery/ui',
    'mage/translate'
], function ($) {
    'use strict';

    $.widget('dvCampusCustomerChat.openButton', {
        options: {
            hideButton: true
        },

        /**
         * @private
         */
        _create: function () {
            $(this.element).on('click.dvCampus_customerChat', $.proxy(this.openChat, this));
            $(this.element).on('dvCampus_CustomerChat_closeChat.dvCampus_customerChat', $.proxy(this.closeChat, this));
        },

        /**
         * @private
         */
        _destroy: function () {
            $(this.element).off('click.dvCampus_customerChat');
            $(this.element).off('dvCampus_CustomerChat_closeChat.dvCampus_customerChat');
        },

        /**
         * Open Chat sidebar
         */
        openChat: function () {
            $(document).trigger('dvCampus_CustomerChat_openChat');

            if (this.options.hideButton) {
                $(this.element).removeClass('active');
            }
        },

        /**
         * Close chat sidebar
         */
        closeChat: function () {
            $(this.element).addClass('active');
        }
    });

    return $.dvCampusCustomerChat.openButton;
});
