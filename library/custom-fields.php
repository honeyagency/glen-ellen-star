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

    if (have_rows('field_5a5d4fcead944', 'option')) {
        while (have_rows('field_5a5d4fcead944', 'option')) {
            the_row();
            $hours[] = array(
                'day'  => get_sub_field('field_5a5d4fe1ad945', 'option'),
                'text' => get_sub_field('field_5a5d4ff3ad946', 'option'),
            );
        }
    }

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
        'footer_address'       => get_field('field_578d582810b37', 'option'),
        'footer_address_link'  => get_field('field_57ca038a61da3', 'option'),
        'footer_bottom'        => get_field('field_57b74298534c9', 'option'));
    return $section;
}

function prepareSocialFields()
{
    $imageId = get_field('field_57e2cb7f7e20a', 'option');
    $image   = new TimberImage($imageId);
    $section = array(
        'facebook'     => get_field('field_578e6b9260eff', 'option'),
        'twitter'      => get_field('field_578e6b9d60f00', 'option'),
        'instagram'    => get_field('field_578e6bb460f01', 'option'),
        'social_image' => $image,
    );
    return $section;
}

function prepareHomepageFields()
{
    $imageId = get_field('field_57ca093118074');
    $image   = new TimberImage($imageId);
    $video   = array(
        'ogg'  => get_field('field_578ea17438012'),
        'mp4'  => get_field('field_578ea18938013'),
        'webm' => get_field('field_578ea1a038014'),
    );
    $reserve = array(
        'text'      => get_field('field_5ed6d5c0db203'),
        'classname' => get_field('field_5ed6d5c9db204'),
        'url'       => get_field('field_5ed6d5d1db205'),
    );
    $section = array(
        'text'      => get_field('field_578eabf3676c8'),
        'link'      => get_field('field_5e715772025fb'),
        'reserve'   => $reserve,
        'messaging' => get_field('field_59e00080760d4'),
        'video'     => $video,
        'image'     => $image,
        'youtube'   => get_field('field_58c3012aa9b6f'),
        'pretext'   => get_field('field_58c356784ed8e'),
        'button'    => get_field('field_58c3015ca9b70'),
    );

    return $section;
}
function preparePressFields()
{
    if (have_rows('field_57be2846aca23')) {
        while (have_rows('field_57be2846aca23')) {
            the_row();
            $imageId = get_sub_field('field_57be285daca24');
            if (!empty($imageId)) {
                $image = new TimberImage($imageId);
            } else {
                $image = null;
            }
            $pressItem[] = array(
                'image'       => $image,
                'title'       => get_sub_field('field_57e1c28010902'),
                'description' => get_sub_field('field_57be287daca26'),
                'link'        => get_sub_field('field_57be2874aca25'),
            );
        }
    }
    $section = array(
        'press'        => $pressItem,
        'link_section' => get_field('field_57e1c6a2e14af'),
    );
    return $section;
}

function prepareMenuPageFields()
{

    if (have_rows('field_57913a2ebe615')) {
        while (have_rows('field_57913a2ebe615')) {
            the_row();
            $image = new TimberImage(get_sub_field('field_57913a3ebe617'));

            if (have_rows('field_57e1864c91bf0')) {
                $menuSection = array();
                while (have_rows('field_57e1864c91bf0')) {
                    the_row();
                    $menuSection[] = array(
                        'title' => get_sub_field('field_57e186e28327a'),
                        'table' => get_sub_field('field_57e186ed8327b'),
                    );
                }
            } else {
                $menuSection = null;
            }
            $menu[] = array(
                'title'         => get_sub_field('field_57913a35be616'),
                'subtitle'      => get_sub_field('field_57e1a19546ca3'),
                'date'          => get_sub_field('field_587fff6c8104e'),
                'image'         => $image,
                'file'          => get_sub_field('field_57913a4cbe618'),
                'table_section' => $menuSection,

            );
        }}

    $section = array(
        'menu' => $menu,
        'link' => get_field('field_57a378dc0fb84'),
        'text' => get_field('field_57a378e80fb85'),
    );
    return $section;
}
