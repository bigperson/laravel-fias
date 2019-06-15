<?php
declare(strict_types=1);
/**
 * This file is part of laravel-fias package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bigperson\Fias\Commands;

use marvin255\fias\Pipe;
use marvin255\fias\service\bag\Bag;
use marvin255\fias\task\Cleanup;
use marvin255\fias\task\DownloadCompleteData;
use marvin255\fias\task\Unpack;
use marvin255\fias\TaskFactory;

class InstallCommand extends AbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fias:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import new all base from fias.nalog.ru';

    /**
     * @var TaskFactory
     */
    private $factory;

    /**
     * @var Pipe
     */
    private $pipe;

    /**
     * InstallCommand constructor.
     * @param TaskFactory $factory
     * @param Pipe $pipe
     */
    public function __construct(TaskFactory $factory, Pipe $pipe)
    {
        parent::__construct();

        $this->factory = $factory;
        $this->pipe = $pipe;
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $pipe = $this->pipe;
        $factory = $this->factory;
        $pipe->pipeTask(new DownloadCompleteData);
        $pipe->pipeTask(new Unpack);
        $pipe->pipeTask($factory->inserter('ActualStatus', $this->getTable('actual_statuses')));
        $pipe->pipeTask($factory->inserter('CenterStatus', $this->getTable('center_statuses')));
        $pipe->pipeTask($factory->inserter('CurrentStatus', $this->getTable('current_statuses')));
        $pipe->pipeTask($factory->inserter('EstateStatus', $this->getTable('estate_statuses')));
        $pipe->pipeTask($factory->inserter('FlatType', $this->getTable('flat_types')));
        $pipe->pipeTask($factory->inserter('IntervalStatus', $this->getTable('interval_statuses')));
        $pipe->pipeTask($factory->inserter('NormativeDocumentType', $this->getTable('normative_document_types')));
        $pipe->pipeTask($factory->inserter('OperationStatus', $this->getTable('operation_statuses')));
        $pipe->pipeTask($factory->inserter('RoomType', $this->getTable('room_types')));
        $pipe->pipeTask($factory->inserter('AddressObjectType', $this->getTable('address_object_types')));
        $pipe->pipeTask($factory->inserter('StructureStatus', $this->getTable('structure_statuses')));
        $pipe->pipeTask($factory->inserter('HouseStateStatus', $this->getTable('house_state_statuses')));
        $pipe->pipeTask($factory->inserter('Object', $this->getTable('address_objects')));
        $pipe->pipeTask($factory->inserter('Stead', $this->getTable('steads')));
        $pipe->pipeTask($factory->inserter('NormativeDocument', $this->getTable('normative_documents')));
        $pipe->pipeTask($factory->inserter('House', $this->getTable('houses')));
        $pipe->pipeTask($factory->inserter('Room', $this->getTable('rooms')));
//        $pipe->setCleanupTask(new Cleanup);
        $pipe->run();
    }
}
