<?php

use Anso\Framework\Console\CommandCollection;
use Algorithms\Console\CommandList;

return new CommandCollection(array_merge(
    CommandList::getCommands()
));
