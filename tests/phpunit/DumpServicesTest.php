<?php

namespace WikibaseDumpProcessor\Tests;

use PHPUnit_Framework_TestCase;
use WikibaseDumpProcessor\DumpServices;

/**
 * @covers WikibaseDumpProcessor\DumpServices
 *
 * @licence GNU GPL v2+
 * @author Katie Filbert < aude.wiki@gmail.com >
 */
class DumpServicesTest extends PHPUnit_Framework_TestCase {

	public function testNewEntityDeserializer() {
		$services = new DumpServices();

		$deserializer = $services->newEntityDeserializer();
		$this->assertInstanceOf( 'Deserializers\DispatchingDeserializer', $deserializer );
	}

}
