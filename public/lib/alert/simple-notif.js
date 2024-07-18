const toastContainer = '<div aria-live="polite" aria-atomic="true" class="position-relative"><div class="toast-container position-fixed end-0 p-2" style="top: 10px; z-index: 1000000 !important;"></div></div>';

        $('html body').append(toastContainer);

        function fireNotif(message = '', icon = 'info', delay = 5000) {

            const toastElm = $('.toast-container');
            let data = getType(icon);
            let Elm =
                '<div class="toast align-items-center border-0 ' + data.class + '" role="alert" aria-live="assertive" aria-atomic="true">' +
                '<div class="toast-header">' +
                data.icon +
                '<strong class="me-auto">' + data.type + '</strong>' +
                '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>' +
                '<div class="d-flex" style="">' +
                '<div class="toast-body">' +
                message +
                '</div>' +
                '</div>' +
                '</div>';
            toastElm.append(Elm);

            var toast = new bootstrap.Toast($('.toast:last'), {
                delay: delay,
                autohide: delay == 0 ? false : true
            });
            toast.show();

            function getType(name) {
                let data;
                switch (name) {
                    case 'success':
                        data = {
                            class: 'text-dark bg-success',
                            icon: '<i class="fa-solid fa-check-circle me-1"></i>',
                            type: 'Thông báo'
                        }
                        return data
                        break;

                    case 'error':
                        data = {
                            class: 'text-dark bg-danger',
                            icon: '<i class="fa-solid fa-xmark-circle me-1"></i>',
                            type: 'Thông báo'
                        }
                        return data
                        break;
                    case 'warning':
                        data = {
                            class: 'text-dark bg-warning',
                            icon: '<i class="fa-solid fa-triangle-exclamation me-1"></i>',
                            type: 'Thông báo'
                        }
                        return data
                        break;

                    case 'question':
                        data = {
                            class: 'text-dark bg-secondary',
                            icon: '<i class="fa-solid fa-question-circle me-1"></i>',
                            type: 'Thông báo'
                        }
                        return data
                        break;

                    case 'info':
                        data = {
                            class: 'text-dark bg-primary',
                            icon: '<i class="fa-solid fa-info-circle me-1"></i>',
                            type: 'Thông báo'
                        }
                        return data
                        break;

                    default:
                        data = {
                            class: 'text-dark bg-primary',
                            icon: '<i class="fa-solid fa-info-circle me-1"></i>',
                            type: 'Thông báo'
                        }
                        return data
                        break;
                }
            }
        }
