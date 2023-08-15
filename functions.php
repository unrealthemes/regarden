<?php
/**
 * di-grand.com
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package di-grand.com
 */

define('THEME_URI', get_template_directory_uri());

// require_once('lib/vendor/autoload.php');
include_once 'inc/loader.php'; // main helper for theme

ut_help()->init();

add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' );
function your_wpcf7_mail_sent_function( $contact_form ) {
    // Перехватываем данные из Contact Form 7
    $title = $contact_form->title;
    $posted_data = $contact_form->posted_data;
    //Вместо "Контактная форма 1" необходимо указать название вашей контактной формы
        $submission = WPCF7_Submission::get_instance();
        $posted_data = $submission->get_posted_data();
        // Далее перехватываем введенные данные в полях Contact Form 7:
        // 1. Перехватываем поле [your-name]
        $firstName = $posted_data['text-101'];
        $phone = $posted_data['tel-250'];
        // 2. Перехватываем поле [your-message]
        $message = $posted_data['textarea-999'];

        // Формируем URL в переменной $queryUrl для отправки сообщений в лиды Битрикс24, где
        // указываем [ваше_название], [идентификатор_пользователя] и [код_вебхука]
        $queryUrl = 'https://moscowlegal.bitrix24.ru/rest/9134/hc2g9zbuv77gqv53/crm.lead.add.json';
        // Формируем параметры для создания лида в переменной $queryData
        $queryData = http_build_query(array(
                'fields' => array(
                    // Устанавливаем название для заголовка лида
                        'TITLE' => 'Заявка с сайта geo-uslugi.ru',
                        'NAME' => $firstName,
                        'COMMENTS' => $message, 
                        'SOURCE_ID' => 'WEB',
                        'ASSIGNED_BY_ID' => 9134,
                        'CREATED_BY_ID' => 9134,
                        'PHONE' => array(
                            array(
                            "VALUE" => $phone,
                            "VALUE_TYPE" => "WORK"
                            )
                        )
                ),
                'params' => array("REGISTER_SONET_EVENT" => "Y")
        ));
        // Обращаемся к Битрикс24 при помощи функции curl_exec
        $curl = curl_init();
        curl_setopt_array($curl, array(
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $queryUrl,
                CURLOPT_POSTFIELDS => $queryData,
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, 1);
        if (array_key_exists('error', $result)) echo "Ошибка при сохранении лида: ".$result['error_description']."<br/>";
} 