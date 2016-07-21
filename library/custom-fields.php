<?php

function prepareSidebarPageFields()
{
    $gallery      = get_field('field_578d5452829b1');
    $galleryArray = array();

    foreach ($gallery as $image) {
        $galleryArray[] = new TimberImage($image['id']);
    }

    return $galleryArray;
}

function prepareRestaurantHours()
{

    if (have_rows('field_578d61ba4d0b3', 'option')) {
        while (have_rows('field_578d61ba4d0b3', 'option')) {
            the_row();
            $other_times[] = array(
                'day'  => get_sub_field('field_578d62034d0b5', 'option'),
                'text' => get_sub_field('field_578d62154d0b6', 'option'),
            );
        }
    }
    $hours = array(
        'sun_open'    => get_field('field_578d61354d0af', 'option'),
        'sun_close'   => get_field('field_578d61604d0b0', 'option'),
        'fri_open'    => get_field('field_578d616a4d0b1', 'option'),
        'fri_close'   => get_field('field_578d61a84d0b2', 'option'),
        'other_times' => $other_times,
    );

    return $hours;
}

function prepareFooterFields()
{
    $section = array(
        'first_button_url'     => get_field('field_578d57ddf5140', 'option'),
        'first_button_text'    => get_field('field_578d57f4f5141', 'option'),
        'second_button_url'    => get_field('field_578d57fcf5142', 'option'),
        'second_button_text'   => get_field('field_578d5801f5143', 'option'),
        'footer_address_title' => get_field('field_578d583210b38', 'option'),
        'footer_address'       => get_field('field_578d582810b37', 'option'));
    return $section;
}

function prepareSocialFields()
{
    $section = array(
        'facebook'  => get_field('field_578e6b9260eff', 'option'),
        'twitter'   => get_field('field_578e6b9d60f00', 'option'),
        'instagram' => get_field('field_578e6bb460f01', 'option'),
    );
    return $section;
}

function prepareHomepageFields()
{
    $video = array(
        'ogg'  => get_field('field_578ea17438012'),
        'mp4'  => get_field('field_578ea18938013'),
        'webm' => get_field('field_578ea1a038014'),
    );
    $section = array(
        'text'     => get_field('field_578eabf3676c8'),
        'cta_text' => get_field('field_578eabf7676c9'),
        'cta_url'  => get_field('field_578eac12676ca'),
        'video'    => $video,
    );
    return $section;
}

function prepareMenuPageFields()
{

    if (have_rows('field_57913a2ebe615')) {
        while (have_rows('field_57913a2ebe615')) {
            the_row();
            $image  = new TimberImage(get_sub_field('field_57913a3ebe617'));
            $menu[] = array(
                'title' => get_sub_field('field_57913a35be616'),
                'image' => $image,
                'file'  => get_sub_field('field_57913a4cbe618'));
        }}
    return $menu;
}
