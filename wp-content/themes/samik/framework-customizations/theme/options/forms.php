<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'tab1' => array(
        'type' => 'tab',
        'title' => 'Главная форма заказа',
        'options' => array (
            'form-1' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'g1' => array(
                        'type' => 'group',
                        'options' => array(
                            'title' => array(
                                'type'  => 'hidden',
                                'value' => 'Главная форма заказа'
                            )
                        )
                    ),
                    'g2' => array(
                        'type' => 'group',
                        'options' => array(
                            'g' => array(
                                'type' => 'group',
                                'options' => array(
                                    'form-title' => array(
                                        'type' => 'text',
                                        'label' => __('Form title', 'samik'),
                                    ),
                                    'hidden' => array(
                                        'type'  => 'switch',
                                        'value' => 'no',
                                        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                                        'label' => __('Hide', 'samik'),
                                        'desc'  => __('Hide form on site', '{domain}'),
                                        'left-choice' => array(
                                            'value' => 'yes',
                                            'label' => __('Yes', 'samik'),
                                        ),
                                        'right-choice' => array(
                                            'value' => 'no',
                                            'label' => __('No', 'samik'),
                                        ),
                                    )
                                )
                            ),
                            'main' => array(
                                'type'    => 'box',
                                'title'   => '',
                                'options' => array(
                                    'id'       => array(
                                        'type'  => 'unique',
                                    ),
                                    'builder'  => array(
                                        'type'    => 'tab',
                                        'title'   => __( 'Form Fields', 'fw' ),
                                        'options' => array(
                                            'form' => array(
                                                'label' => false,
                                                'type'  => 'form-builder',
                                                'value' => array(
                                                    'json' => apply_filters('fw:ext:forms:builder:load-item:form-header-title', true)
                                                        ? json_encode( array(
                                                            array(
                                                                'type'      => 'form-header-title',
                                                                'shortcode' => 'form_header_title',
                                                                'width'     => '',
                                                                'options'   => array(
                                                                    'title'    => '',
                                                                    'subtitle' => '',
                                                                )
                                                            )
                                                        ) )
                                                        : '[]'
                                                ),
                                                'fixed_header' => true,
                                            ),
                                        ),
                                    ),
                                    'settings' => array(
                                        'type'    => 'tab',
                                        'title'   => __( 'Settings', 'fw' ),
                                        'options' => array(
                                            'settings-options' => array(
                                                'title'   => __( 'Options', 'fw' ),
                                                'type'    => 'tab',
                                                'options' => array(
                                                    'form_email_settings' => array(
                                                        'type'    => 'group',
                                                        'options' => array(
                                                            'email_to' => array(
                                                                'type'  => 'text',
                                                                'label' => __( 'Email To', 'fw' ),
                                                                'help' => __( 'We recommend you to use an email that you verify often', 'fw' ),
                                                                'desc'  => __( 'The form will be sent to this email address.', 'fw' ),
                                                            ),
                                                        ),
                                                    ),
                                                    'form_text_settings'  => array(
                                                        'type'    => 'group',
                                                        'options' => array(
                                                            'subject-group' => array(
                                                                'type' => 'group',
                                                                'options' => array(
                                                                    'subject_message'    => array(
                                                                        'type'  => 'text',
                                                                        'label' => __( 'Subject Message', 'fw' ),
                                                                        'desc' => __( 'This text will be used as subject message for the email', 'fw' ),
                                                                        'value' => __( 'Contact Form', 'fw' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'submit-button-group' => array(
                                                                'type' => 'group',
                                                                'options' => array(
                                                                    'submit_button_text' => array(
                                                                        'type'  => 'text',
                                                                        'label' => __( 'Submit Button', 'fw' ),
                                                                        'desc' => __( 'This text will appear in submit button', 'fw' ),
                                                                        'value' => __( 'Send', 'fw' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'success-group' => array(
                                                                'type' => 'group',
                                                                'options' => array(
                                                                    'success_message'    => array(
                                                                        'type'  => 'text',
                                                                        'label' => __( 'Success Message', 'fw' ),
                                                                        'desc' => __( 'This text will be displayed when the form will successfully send', 'fw' ),
                                                                        'value' => __( 'Message sent!', 'fw' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'failure_message'    => array(
                                                                'type'  => 'text',
                                                                'label' => __( 'Failure Message', 'fw' ),
                                                                'desc' => __( 'This text will be displayed when the form will fail to be sent', 'fw' ),
                                                                'value' => __( 'Oops something went wrong.', 'fw' ),
                                                            ),
                                                        ),
                                                    ),
                                                )
                                            ),
                                            'mailer-options'   => array(
                                                'title'   => __( 'Mailer', 'fw' ),
                                                'type'    => 'tab',
                                                'options' => array(
                                                    'mailer' => array(
                                                        'label' => false,
                                                        'type'  => 'mailer'
                                                    )
                                                )
                                            )
                                        ),
                                    ),
                                ),
                            )
                        ),
                    ),
                )
            ),
        )
    ),
    'tab2' => array(
        'type' => 'tab',
        'title' => 'Форма обратной связи',
        'options' => array (
            'form-2' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'g1' => array(
                        'type' => 'group',
                        'options' => array(
                            'title' => array(
                                'type'  => 'hidden',
                                'value' => 'Форма обратной связи'
                            ),
                        )
                    ),
                    'g2' => array(
                        'type' => 'group',
                        'options' => array(
                            'g' => array(
                                'type' => 'group',
                                'options' => array(
                                    'form-title' => array(
                                        'type' => 'text',
                                        'label' => __('Form title', 'samik'),
                                    ),
                                    'hidden' => array(
                                        'type'  => 'switch',
                                        'value' => 'no',
                                        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                                        'label' => __('Hide', 'samik'),
                                        'desc'  => __('Hide form on site', '{domain}'),
                                        'left-choice' => array(
                                            'value' => 'yes',
                                            'label' => __('Yes', 'samik'),
                                        ),
                                        'right-choice' => array(
                                            'value' => 'no',
                                            'label' => __('No', 'samik'),
                                        ),
                                    )
                                )
                            ),
                            'main' => array(
                                'type'    => 'box',
                                'title'   => '',
                                'options' => array(
                                    'id'       => array(
                                        'type'  => 'unique',
                                    ),
                                    'builder'  => array(
                                        'type'    => 'tab',
                                        'title'   => __( 'Form Fields', 'fw' ),
                                        'options' => array(
                                            'form' => array(
                                                'label' => false,
                                                'type'  => 'form-builder',
                                                'value' => array(
                                                    'json' => apply_filters('fw:ext:forms:builder:load-item:form-header-title', true)
                                                        ? json_encode( array(
                                                            array(
                                                                'type'      => 'form-header-title',
                                                                'shortcode' => 'form_header_title',
                                                                'width'     => '',
                                                                'options'   => array(
                                                                    'title'    => '',
                                                                    'subtitle' => '',
                                                                )
                                                            )
                                                        ) )
                                                        : '[]'
                                                ),
                                                'fixed_header' => true,
                                            ),
                                        ),
                                    ),
                                    'settings' => array(
                                        'type'    => 'tab',
                                        'title'   => __( 'Settings', 'fw' ),
                                        'options' => array(
                                            'settings-options' => array(
                                                'title'   => __( 'Options', 'fw' ),
                                                'type'    => 'tab',
                                                'options' => array(
                                                    'form_email_settings' => array(
                                                        'type'    => 'group',
                                                        'options' => array(
                                                            'email_to' => array(
                                                                'type'  => 'text',
                                                                'label' => __( 'Email To', 'fw' ),
                                                                'help' => __( 'We recommend you to use an email that you verify often', 'fw' ),
                                                                'desc'  => __( 'The form will be sent to this email address.', 'fw' ),
                                                            ),
                                                        ),
                                                    ),
                                                    'form_text_settings'  => array(
                                                        'type'    => 'group',
                                                        'options' => array(
                                                            'subject-group' => array(
                                                                'type' => 'group',
                                                                'options' => array(
                                                                    'subject_message'    => array(
                                                                        'type'  => 'text',
                                                                        'label' => __( 'Subject Message', 'fw' ),
                                                                        'desc' => __( 'This text will be used as subject message for the email', 'fw' ),
                                                                        'value' => __( 'Contact Form', 'fw' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'submit-button-group' => array(
                                                                'type' => 'group',
                                                                'options' => array(
                                                                    'submit_button_text' => array(
                                                                        'type'  => 'text',
                                                                        'label' => __( 'Submit Button', 'fw' ),
                                                                        'desc' => __( 'This text will appear in submit button', 'fw' ),
                                                                        'value' => __( 'Send', 'fw' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'success-group' => array(
                                                                'type' => 'group',
                                                                'options' => array(
                                                                    'success_message'    => array(
                                                                        'type'  => 'text',
                                                                        'label' => __( 'Success Message', 'fw' ),
                                                                        'desc' => __( 'This text will be displayed when the form will successfully send', 'fw' ),
                                                                        'value' => __( 'Message sent!', 'fw' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'failure_message'    => array(
                                                                'type'  => 'text',
                                                                'label' => __( 'Failure Message', 'fw' ),
                                                                'desc' => __( 'This text will be displayed when the form will fail to be sent', 'fw' ),
                                                                'value' => __( 'Oops something went wrong.', 'fw' ),
                                                            ),
                                                        ),
                                                    ),
                                                )
                                            ),
                                            'mailer-options'   => array(
                                                'title'   => __( 'Mailer', 'fw' ),
                                                'type'    => 'tab',
                                                'options' => array(
                                                    'mailer' => array(
                                                        'label' => false,
                                                        'type'  => 'mailer'
                                                    )
                                                )
                                            )
                                        ),
                                    ),
                                ),
                            )
                        ),
                    ),
                )
            ),
        )
    ),
    'tab3' => array(
        'type' => 'tab',
        'title' => 'Форма заказа звонка',
        'options' => array (
            'form-3' => array(
                'type'  => 'multi',
                'inner-options' => array(
                    'g1' => array(
                        'type' => 'group',
                        'options' => array(
                            'title' => array(
                                'type'  => 'hidden',
                                'value' => 'Форма заказа звонка'
                            ),
                        )
                    ),
                    'g2' => array(
                        'type' => 'group',
                        'options' => array(
                            'g' => array(
                                'type' => 'group',
                                'options' => array(
                                    'form-title' => array(
                                        'type' => 'text',
                                        'label' => __('Form title', 'samik'),
                                    ),
                                    'hidden' => array(
                                        'type'  => 'switch',
                                        'value' => 'no',
                                        'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
                                        'label' => __('Hide', 'samik'),
                                        'desc'  => __('Hide form on site', '{domain}'),
                                        'left-choice' => array(
                                            'value' => 'yes',
                                            'label' => __('Yes', 'samik'),
                                        ),
                                        'right-choice' => array(
                                            'value' => 'no',
                                            'label' => __('No', 'samik'),
                                        ),
                                    )
                                )
                            ),
                            'main' => array(
                                'type'    => 'box',
                                'title'   => '',
                                'options' => array(
                                    'id'       => array(
                                        'type'  => 'unique',
                                    ),
                                    'builder'  => array(
                                        'type'    => 'tab',
                                        'title'   => __( 'Form Fields', 'fw' ),
                                        'options' => array(
                                            'form' => array(
                                                'label' => false,
                                                'type'  => 'form-builder',
                                                'value' => array(
                                                    'json' => apply_filters('fw:ext:forms:builder:load-item:form-header-title', true)
                                                        ? json_encode( array(
                                                            array(
                                                                'type'      => 'form-header-title',
                                                                'shortcode' => 'form_header_title',
                                                                'width'     => '',
                                                                'options'   => array(
                                                                    'title'    => '',
                                                                    'subtitle' => '',
                                                                )
                                                            )
                                                        ) )
                                                        : '[]'
                                                ),
                                                'fixed_header' => true,
                                            ),
                                        ),
                                    ),
                                    'settings' => array(
                                        'type'    => 'tab',
                                        'title'   => __( 'Settings', 'fw' ),
                                        'options' => array(
                                            'settings-options' => array(
                                                'title'   => __( 'Options', 'fw' ),
                                                'type'    => 'tab',
                                                'options' => array(
                                                    'form_email_settings' => array(
                                                        'type'    => 'group',
                                                        'options' => array(
                                                            'email_to' => array(
                                                                'type'  => 'text',
                                                                'label' => __( 'Email To', 'fw' ),
                                                                'help' => __( 'We recommend you to use an email that you verify often', 'fw' ),
                                                                'desc'  => __( 'The form will be sent to this email address.', 'fw' ),
                                                            ),
                                                        ),
                                                    ),
                                                    'form_text_settings'  => array(
                                                        'type'    => 'group',
                                                        'options' => array(
                                                            'subject-group' => array(
                                                                'type' => 'group',
                                                                'options' => array(
                                                                    'subject_message'    => array(
                                                                        'type'  => 'text',
                                                                        'label' => __( 'Subject Message', 'fw' ),
                                                                        'desc' => __( 'This text will be used as subject message for the email', 'fw' ),
                                                                        'value' => __( 'Contact Form', 'fw' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'submit-button-group' => array(
                                                                'type' => 'group',
                                                                'options' => array(
                                                                    'submit_button_text' => array(
                                                                        'type'  => 'text',
                                                                        'label' => __( 'Submit Button', 'fw' ),
                                                                        'desc' => __( 'This text will appear in submit button', 'fw' ),
                                                                        'value' => __( 'Send', 'fw' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'success-group' => array(
                                                                'type' => 'group',
                                                                'options' => array(
                                                                    'success_message'    => array(
                                                                        'type'  => 'text',
                                                                        'label' => __( 'Success Message', 'fw' ),
                                                                        'desc' => __( 'This text will be displayed when the form will successfully send', 'fw' ),
                                                                        'value' => __( 'Message sent!', 'fw' ),
                                                                    ),
                                                                )
                                                            ),
                                                            'failure_message'    => array(
                                                                'type'  => 'text',
                                                                'label' => __( 'Failure Message', 'fw' ),
                                                                'desc' => __( 'This text will be displayed when the form will fail to be sent', 'fw' ),
                                                                'value' => __( 'Oops something went wrong.', 'fw' ),
                                                            ),
                                                        ),
                                                    ),
                                                )
                                            ),
                                            'mailer-options'   => array(
                                                'title'   => __( 'Mailer', 'fw' ),
                                                'type'    => 'tab',
                                                'options' => array(
                                                    'mailer' => array(
                                                        'label' => false,
                                                        'type'  => 'mailer'
                                                    )
                                                )
                                            )
                                        ),
                                    ),
                                ),
                            )
                        ),
                    ),
                )
            ),
        )
    ),
);
