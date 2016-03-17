<?php

namespace WikibaseDumpProcessor;

use Wikibase\DataModel\Entity\EntityDocument;

interface EntityHandler {

	public function handleEntity( EntityDocument $entity );

}
