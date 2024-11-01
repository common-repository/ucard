<?php
/**
 * @package Ucard
 * @author RainaStudio
 * @version 1.0.1
 */
?>
<div class="ucard">
    <div class="header">
        <div class="wrapper">
            <div class="nav_logo">
                <img src="<?php echo ucard_img . 'logo.svg' ?>" alt="Ucard">
                <h1 class="name">Ucard</h1>
            </div>
            <div class="flex-button-g">
                <span class="button-group">
                    <a href="#" type="button" id="s_ucard" class="ucard-button is-drops"><?php _e( 'Save Changes', 'ucard' ); ?></a
                    ><a href="?r_ucard=1" onclick="return confirm('Are you sure you want to reset?')" type="button" id="r_ucard" class="ucard-button is-drops"><?php _e( 'Reset Default', 'ucard' ); ?></a>
                </span>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="wrapper">
            <h2><?php _e( 'Card Templates and Option Settings', 'ucard' ); ?></h2>
            <p class="description"><?php _e( 'A tool to makeover blog and post loop UI.', 'ucard' ); ?></p>
            <form method="post" action="options.php" class="ucard flex-with">
                <?php settings_fields( 'ucard_opitions_settings' ); ?>
                <?php do_settings_sections( 'ucard_opitions_settings' ); ?>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Enable UI Card', 'ucard' ); ?></h3>
                                <p><?php _e( 'On or Off the Ucard system.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="enable_for_all" id="enable_for_all" value="1"<?php checked( 1, get_option( 'enable_for_all' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiguiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Select UI Card Template', 'ucard' ); ?></h3>
                                <p><?php _e( 'Choose the design you want to apply.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                            <div class="flex-button-g">
                                <span class="button-group">
                                    <a href="https://rainastudio.com/products/ucard/" type="button" target="_blank" class="ucard-button is-drops buy">Buy Ucard Pro</a><a href="https://rainastudio.com/demo/ucard/" type="button" target="_blank" class="ucard-button is-drops demo">Check Demo</a>
                                </span>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Apply UI Card Design for Archive', 'ucard' ); ?></h3>
                                <p><?php _e( 'Apply UI Card design for archive pages.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <div class="checkbox-all-wrapper">
                                    <label class="container"><?php _e( 'Check all', 'ucard' ); ?>
                                        <input class="checkbox" type="checkbox" name="enable_for_all_check" id="enable_for_all_check" value="all"<?php checked( 'all', get_option( 'enable_for_all_check' ) ); ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <br />
                                <div class="ant-checkbox-group">
                                    <label class="container"><?php _e( 'Category', 'ucard' ); ?>
                                        <input class="checkbox" type="checkbox" name="enable_for_cat" id="enable_for_cat" value="cat"<?php checked( 'cat', get_option( 'enable_for_cat' ) ); ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container"><?php _e( 'Tags', 'ucard' ); ?>
                                        <input class="checkbox" type="checkbox" name="enable_for_tag" id="enable_for_tag" value="tag"<?php checked( 'tag', get_option( 'enable_for_tag' ) ); ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Like Button', 'ucard' ); ?></h3>
                                <p><?php _e( 'Enable a like button in card.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="enable_like_btn" id="enable_like_btn" value="1"<?php checked( 1, get_option( 'enable_like_btn' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Reading Time', 'ucard' ); ?></h3>
                                <p><?php _e( 'Enable a estimated post reading time in card.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="enable_reading_time" id="enable_reading_time" value="1"<?php checked( 1, get_option( 'enable_reading_time' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Date of', 'ucard' ); ?></h3>
                                <p><?php _e( 'Enable the date of post publishing or last update in card.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <?php $radio_option = get_option('enable_date'); ?>
                                <label class="container radio"><?php _e( 'Publish', 'ucard' ); ?>
                                    <input type="radio" name="enable_date[date]" id="enable_pdate" value="publish"<?php checked( 'publish', $radio_option['date'] ); ?>>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container radio"><?php _e( 'Last Update', 'ucard' ); ?>
                                    <input type="radio" name="enable_date[date]" id="enable_ldate" value="last_update"<?php checked( 'last_update', $radio_option['date'] ); ?>>
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Category Meta', 'ucard' ); ?></h3>
                                <p><?php _e( 'Show post categories in card.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="enable_cat_meta" id="enable_cat_meta" value="1"<?php checked( 1, get_option( 'enable_cat_meta' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Comment Count', 'ucard' ); ?></h3>
                                <p><?php _e( 'Show total post comments in card.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="enable_comment_c" id="enable_comment_c" value="1"<?php checked( 1, get_option( 'enable_comment_c' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Author Name', 'ucard' ); ?></h3>
                                <p><?php _e( 'Show the post author name.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="enable_author_name" id="enable_author_name" value="1"<?php checked( 1, get_option( 'enable_author_name' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Author Avatar', 'ucard' ); ?></h3>
                                <p><?php _e( 'Show the post author avatar in card.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="enable_author_avatar" id="enable_author_avatar" value="1"<?php checked( 1, get_option( 'enable_author_avatar' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Read More Button', 'ucard' ); ?></h3>
                                <p><?php _e( 'Show the continue reading button in card.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="enable_read_more" id="enable_read_more" value="1"<?php checked( 1, get_option( 'enable_read_more' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Post View', 'ucard' ); ?></h3>
                                <p><?php _e( 'Show the total post view count in card.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="enable_post_view" id="enable_post_view" value="1"<?php checked( 1, get_option( 'enable_post_view' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Post Excerpt Length', 'ucard' ); ?></h3>
                                <p><?php _e( 'Limit post excerpt length by characters in card.', 'ucard' ); ?></p>
                            </td>
                            <td class="options">
                                <div class="islidecontainer">
                                    <input type="range" name="enable_excerpt_l" id="enable_excerpt_l" min="80" max="300" value="<?php echo htmlspecialchars( get_option('enable_excerpt_l') ); ?>" class="islider">
                                    <p>Characters: <span id="sliderval"><?php echo htmlspecialchars( get_option('enable_excerpt_l') ); ?></span></p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
    </div>
</div>
<style type='text/css'>
#wpcontent {
    padding-left: 0px;
}
</style>