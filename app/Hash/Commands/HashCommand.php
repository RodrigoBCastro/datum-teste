<?php

namespace App\Hash\Commands;

use App\Hash\Models\HashRegistre;
use App\Hash\Models\HashRegistreRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Request;

class HashCommand extends Command
{
    private HashRegistreRepositoryInterface $hashRegistreRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'avato:teste {string} {requests=100}';

    /**
     * The console command description.
     *
     * @var string
     */

    public function __construct
    (
        HashRegistreRepositoryInterface $hashRegistreRepository,
    )
    {
        parent::__construct();
        $this->hashRegistreRepository = $hashRegistreRepository;
    }

    public function handle()
    {
        $order = 0;
        $qty = $this->argument('requests');
        $time = Carbon::createFromDate()->format('Y/m/d H:m:s');

        do {
            $order += 1;
            $string = $order == 1 ? $this->argument('string') : $acual_registre->hash;

            $request = Request::create(route('hash_generate'), 'POST', [
                'string' => $string,
            ]);

            $response = app()->handle($request);

            if ($response->getStatusCode() == 429) {
                $order -= 1;
                continue;
            }

            $limit = (int) $response->headers->get('X-RateLimit-Remaining');
            $response_body = json_decode($response->getContent(), true);

            $registre = [
                'batch' => $time,
                'block_sequency' => $order,
                'entrace_string' => $string,
                'find_key' => $response_body['key'],
                'hash' => $response_body['hash'],
                'trys' => $response_body['trys'],
            ];

            $new_registre = new HashRegistre($registre);
            $acual_registre = $this->hashRegistreRepository->save($new_registre);

            if ($limit == 0)
                sleep(60);

        } while ($order < $qty);
    }
}
