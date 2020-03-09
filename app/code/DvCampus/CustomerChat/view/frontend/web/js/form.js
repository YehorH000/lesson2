define([
    'jquery',
    'Magento_Ui/js/modal/alert',
    'Magento_Ui/js/modal/modal'
], function ($, alert) {
    'use strict';

    $.widget('dvCampusCustomerChat.form', {
        options: {
            ChatPreferencesMessages: '#DvCampus_ChatPreferences_Messages'
        },

        /**
         * @private
         */
        _create: function () {
            this.modal = $(this.element).modal({
                buttons: []
            });

            $(this.element).on('submit.dvCampus_customerChat', $.proxy(this.saveChat, this));
        },

        /**
         * @private
         */
        _destroy: function () {
            this.modal.closeModal();
            $(this.element).off('submit.dvCampus_customerChat');
            this.modal.destroy();
        },

        /**
         * Save Chat
         */
        saveChat: function () {
            if (!this.validateForm()) {
                return;
            }

            this.ajaxSubmit();
        },

        /**
         * Validate request form
         */
        validateForm: function () {
            return $(this.element).validation().valid();
        },

        /**
         * Submit request via AJAX. Add form key to the post data.
         */
        ajaxSubmit: function () {
            var formData = new FormData($(this.element).get(0));

            formData.append('form_key', $.mage.cookies.get('form_key'));
            formData.append('isAjax', 1);

            $.ajax({
                url: this.options.action,
                data: formData,
                processData: false,
                contentType: false,
                type: 'post',
                dataType: 'json',
                context: this,

                /** @inheritdoc */
                beforeSend: function () {
                    $('body').trigger('processStart');
                },

                /** @inheritdoc */
                success: function (response) {
                    $('body').trigger('processStop');
                    this.getMessage(response);
                    alert({
                        title: $.mage.__('Success')
                    });
                }
            });
        },

        /**
         * Get Message
         */
        getMessage: function (messageInfo) {
            var date = new Date(),
             time = date.getHours() + ':hours ' + date.getMinutes() + ':minutes ' + date.getSeconds() + ':seconds',
             $messagesChat = $('#DvCampus_ChatPreferences_Messages'),
             $messagesChatItem = $('<li>').addClass('message-chat-item'),
             $name = $('<h2>').addClass('name').text(messageInfo.name),
             $getTime = $('<h3>').addClass('getTime').text(time),
             $message = $('<p>').addClass('customer-message-main-content').text(messageInfo.message),
             $messageAdminItem = $('<li>').addClass('admin-message message-item'),
             $adminMessage = $('<p>').addClass('admin-message-main-content').text('Please wait 5 minutes!');

            $messagesChatItem.append($name);
            $messagesChatItem.append($getTime);
            $messagesChatItem.append($message);
            $messagesChat.append($messagesChatItem);
            $messageAdminItem.append($adminMessage);
            $messagesChat.append($messageAdminItem);
        }
    });

    return $.dvCampusCustomerChat.form;
});
