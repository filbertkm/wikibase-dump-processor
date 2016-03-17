<?php

namespace WikibaseDumpProcessor\Tests;

use PHPUnit_Framework_TestCase;
use WikibaseDumpProcessor\Services;

/**
 * @covers WikibaseDumpProcessor\Services
 *
 * @licence GNU GPL v2+
 * @author Katie Filbert < aude.wiki@gmail.com >
 */
class ServicesTest extends PHPUnit_Framework_TestCase {

	public function testNewEntityDeserializer() {
		$services = new Services();

		$deserializer = $services->newEntityDeserializer();
		$this->assertInstanceOf( 'Deserializers\DispatchingDeserializer', $deserializer );
	}

}
