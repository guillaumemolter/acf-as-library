<?php
namespace GuillaumeMolter\ACFAsLibrary;

/**
 * ACF WordPress Plugin as a library.
 */
class ACFLib
{

    /**
     * The path to the ACF files.
     *
     * @var string
     */
    public $path_to_acf;

    /**
     * The url to the ACF files.
     *
     * @var string
     */
    public $url_to_acf;

    /**
     * Hide/show the ACF wp admin menu.
     *
     * @var boolean
     */
    public $show_admin;

    /**
     * Class constructor.
     *
     * @param string $path_to_acf The path to the ACF files
     * @param string $url_to_acf The url to the ACF files
     * @param boolean $show_admin Hide/show the ACF wp admin menu.
     * @return void
     */
    public function __construct($path_to_acf, $url_to_acf, $show_admin = false)
    {
        $this->path_to_acf = $path_to_acf;
        $this->url_to_acf = $url_to_acf;

        if ($show_admin === true) {
            $this->show_admin = true;
        } else {
            $this->show_admin = false;
        }
    }

    /**
     * Register the required ACF WordPress hooks.
     *
     * @return void
     */
    public function init()
    {
        try {
            // Change ACF path.
            add_filter('acf/settings/path', function () {
                return $this->path_to_acf;
            });
            // Change ACF url.
            add_filter('acf/settings/dir', function () {
                return $this->url_to_acf;
            });
            // Hide the ACF menu item.
            if ($this->show_admin === false) {
                add_filter('acf/settings/show_admin', '__return_false');
            }
            // Include the ACF loader.
            include_once $this->path_to_acf . 'acf.php';
        } catch (Exception $e) {
            echo 'ACFAsLibrary caught an exception: ' .  $e->getMessage() . "\n";
        }
    }
}
