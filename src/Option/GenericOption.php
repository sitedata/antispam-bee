<?php
declare( strict_types = 1 );

namespace Pluginkollektiv\AntispamBee\Option;

use Pluginkollektiv\AntispamBee\Exceptions\Runtime;
use Pluginkollektiv\AntispamBee\Field\FieldInterface;

class GenericOption implements OptionInterface
{

    private $name;
    private $description;

    /**
     * @var FieldInterface[]
     */
    private $fields = [];
    private $activateable;

    public function __construct( string $name, string $description, bool $activateable, FieldInterface ...$fields )
    {
        $this->name        = $name;
        $this->description = $description;
        foreach ( $fields as $field ) {
            $this->fields[ $field->key() ] = $field;
        }
        $this->activateable = $activateable;
    }

    /**
     * @return FieldInterface[]
     */
    public function fields() : array
    {
        return $this->fields;
    }

    public function activateable() : bool
    {
        return $this->activateable;
    }

    public function name() : string
    {
        return $this->name;
    }

    public function description() : string
    {
        return $this->description;
    }

    public function has( string $key ) : bool
    {
        return array_key_exists($key, $this->fields);
    }

    public function get( string $key )
    {

        if (! isset($this->fields[ $key ]) ) {
            throw new Runtime("Field $key does not exist.");
        }
        return $this->fields[ $key ]->value();
    }
    public function sanitize( $raw_value, string $key )
    {

        return sanitize_text_field($raw_value);
    }
}
