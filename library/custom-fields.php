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
