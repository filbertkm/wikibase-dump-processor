<?php

namespace WikibaseDumpProcessor;

use Deserializers\DispatchingDeserializer;

class JsonDumpProcessor {

	private $entityDeserializer;

	private $entityHandler;

	public function __construct(
		DispatchingDeserializer $entityDeserializer,
		EntityHandler $entityHandler
	) {
		$this->entityDeserializer = $entityDeserializer;
		$this->entityHandler = $entityHandler;
	}

	public function process( $dumpFile ) {
		$handle = gzopen( $dumpFile, "r" );

		while ( $line = gzgets( $handle, 100000000 ) ) {
			$data = json_decode( rtrim( $line, ",\n" ), true );

			if ( $data !== null ) {
				$entity = $this->entityDeserializer->deserialize( $data );
				$this->entityHandler->handleEntity( $entity );
			}
		}

		gzclose( $handle );
	}

}
