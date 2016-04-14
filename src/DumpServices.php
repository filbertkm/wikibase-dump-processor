<?php

namespace WikibaseDumpProcessor;

use DataValues\Deserializers\DataValueDeserializer;
use DataValues\Geo\Values\GlobeCoordinateValue;
use DataValues\MonolingualTextValue;
use DataValues\NumberValue;
use DataValues\QuantityValue;
use DataValues\StringValue;
use DataValues\TimeValue;
use DataValues\UnknownValue;
use Wikibase\DataModel\DeserializerFactory;
use Wikibase\DataModel\Entity\BasicEntityIdParser;
use Wikibase\DataModel\Entity\DispatchingEntityIdParser;
use Wikibase\DataModel\Entity\EntityIdValue;

class DumpServices {

	public function newEntityDeserializer() {
		return $this->newDeserializerFactory()->newEntityDeserializer();
	}

	private function newDeserializerFactory() {
		return new DeserializerFactory(
			$this->newDataValueDeserializer(),
			$this->newEntityIdParser()
		);
	}

	private function newDataValueDeserializer() {
        return new DataValueDeserializer( array(
            'number' => NumberValue::class,
            'string' => StringValue::class,
            'unknown' => UnknownValue::class,
            'globecoordinate' => GlobeCoordinateValue::class,
            'monolingualtext' => MonolingualTextValue::class,
            'quantity' => QuantityValue::class,
            'time' => TimeValue::class,
            'wikibase-entityid' => EntityIdValue::class,
        ) );
	}

	private function newEntityIdParser() {
		return new DispatchingEntityIdParser( BasicEntityIdParser::getBuilders() );
	}

}
