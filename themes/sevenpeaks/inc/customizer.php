<?php

  function customize_sevenpeaks_settings(WP_Customize_Manager $wp_customize) {
    $wp_customize->add_setting('theme_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control(
      $wp_customize,
      'theme_logo',
      [
        'label'     => 'Upload Logo',
        'section'   => 'title_tagline',
        'settings'  => 'theme_logo'
      ]
    ));

    $wp_customize->add_section('business_details',
      [
        'title'       => 'Business Details',
        'description' => '',
        'priority'    => 30
    ]);

    $wp_customize->add_setting('business_phone', [
			'default'				=> '0114 478 4780',
      'transport'     => 'postMessage'
    ]);
    $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize,
      'business_phone',
      [
        'label'     => 'Phone Number',
        'section'   => 'business_details',
        'settings'  => 'business_phone'
      ]
    ));

    $wp_customize->add_setting('business_address', [
      'transport'     => 'postMessage'
    ]);
    $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize,
      'business_address',
      [
        'label'     => 'Address',
        'section'   => 'business_details',
        'settings'  => 'business_address'
      ]
    ));

    $wp_customize->add_setting('business_email', [
      'transport'     => 'postMessage'
    ]);
    $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize,
      'business_email',
      [
        'label'     => 'Email',
        'section'   => 'business_details',
        'settings'  => 'business_email'
      ]
    ));

  }
  add_action( 'customize_register', 'customize_sevenpeaks_settings' )
?>
