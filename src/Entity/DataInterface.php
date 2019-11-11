<?php
/**
 * Thanks to the modular approach, a lot of data can be analyzed for spam. Therefore the filter accept every
 * data structure, which implements the DataInterface.
 *
 * @package Antispam Bee Entity
 */
declare( strict_types = 1 );

namespace Pluginkollektiv\AntispamBee\Entity;

interface DataInterface
{

    /**
     * An text associated with this data structure or an empty string.
     *
     * @return string
     */
    public function text() : string;

    /**
     * An email address associated with this data structure or an empty string.
     *
     * @return string
     */
    public function email() : string;

    /**
     * The IP of the author of this data structure or an empty string.
     *
     * @return string
     */
    public function ip() : string;

    /**
     * The name of the author of this data structure  or an empty string.
     *
     * @return string
     */
    public function author() : string;

    /**
     * A URL to a website. If none given, return an empty string.
     *
     * @return string
     */
    public function website() : string;

    /**
     * An user ID associated to the data structure. If no user is associated return 0.
     *
     * @return int
     */
    public function user_id() : int;

    /**
     * You can determine a type. For example, a comment could also be a trackback or a ping.
     *
     * @return string
     */
    public function type(): string;

    /**
     * Post ID associated with the data structure. If no post is associated return 0.
     *
     * @return int
     */
    public function post() : int;
}
