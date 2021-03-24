<?php
/**
 * @package themecentury
 * @subpackage centurylib
 * @since centurylib 1.0.0
 * @version 1.0.0
 * @description this file for icon field
 */
?>
<div class="tcy-widget-field-wrapper centurylib-icons-wrapper <?php echo esc_attr($wrapper); ?>">
    <div class="centurylib-icon-preview">
        <?php if( !empty( $value ) ) { echo '<i class="fa '. esc_attr( $value ).'"></i>'; } ?>
    </div>
    <div class="icon-toggle">
        <?php echo ( empty( $value )? esc_html__('Add Icon','slain'): esc_html__('Edit Icon','slain') ); ?>
        <span class="dashicons dashicons-arrow-down"></span>
    </div>
    <div class="icons-list-wrapper hidden">
        <input class="icon-search widefat" type="text" placeholder="<?php esc_attr_e('Search Icon','slain')?>">
        <?php
        $centurylib_icons_list = centurylib_fa_iconslist();
        foreach ( $centurylib_icons_list as $single_icon ) {
            if( $value == $single_icon ) {
                echo '<span class="single-icon selected"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
            } else {
                echo '<span class="single-icon"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
            }
        }
        ?>
    </div>
    <input class="widefat tcy-icon-value <?php echo esc_attr($centurylib_widget_relation_class); ?>" id="<?php echo esc_attr( $centurywidget->get_field_id( $name ) ); ?>" type="hidden" name="<?php echo esc_attr( $centurywidget->get_field_name( $name ) ); ?>" value="<?php echo esc_attr( $value ); ?>" placeholder="fa-desktop"  data-relations="<?php echo esc_attr($centurylib_widget_relation_json) ?>"/>
</div>