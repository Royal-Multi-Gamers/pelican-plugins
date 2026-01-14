<?php

namespace Boy132\PlayerCounter\Database\Seeders;

use App\Models\Egg;
use Boy132\PlayerCounter\Enums\GameQueryType;
use Boy132\PlayerCounter\Models\EggGameQuery;
use Boy132\PlayerCounter\Models\GameQuery;
use Illuminate\Database\Seeder;

class PlayerCounterSeeder extends Seeder
{
    /**
     * Mapping of egg names/patterns to query types
     */
    protected array $eggMappings = [
        // Minecraft
        'minecraft' => 'minecraft',
        'bedrock' => 'minecraftbe',
        
        // Rust
        'rust' => 'rust',
        
        // ARK
        'ark: survival evolved' => 'arkse',
        'ark: survival ascended' => 'arksa',
        
        // Source Engine Games
        'counter-strike: global offensive' => 'csgo',
        'cs:go' => 'csgo',
        'counter-strike: source' => 'css',
        'counter-strike 1.6' => 'cs16',
        'team fortress 2' => 'tf2',
        'left 4 dead' => 'l4d',
        'left 4 dead 2' => 'l4d2',
        "garry's mod" => 'gmod',
        'gmod' => 'gmod',
        'half-life 2: deathmatch' => 'hl2dm',
        'day of defeat' => 'dod',
        'day of defeat: source' => 'dods',
        'black mesa' => 'blackmesa',
        'insurgency' => 'insurgency',
        'insurgency: sandstorm' => 'insurgencysand',
        'killing floor' => 'killingfloor',
        'killing floor 2' => 'killingfloor2',
        'no more room in hell' => 'nmrih',
        
        // Survival Games
        'valheim' => 'valheim',
        'v rising' => 'vrising',
        '7 days to die' => 'sevendaystodie',
        'conan exiles' => 'conanexiles',
        'the forest' => 'theforrest',
        'dayz' => 'dayz',
        'miscreated' => 'miscreated',
        'hurtworld' => 'hurtworld',
        'unturned' => 'unturned',
        'life is feudal' => 'lifeisfeudal',
        'eco' => 'eco',
        'barotrauma' => 'barotrauma',
        'avorion' => 'avorion',
        'stationeers' => 'stationeers',
        'stormworks' => 'stormworks',
        
        // Military Simulators
        'arma 3' => 'arma3',
        'arma' => 'arma',
        'squad' => 'squad',
        'post scriptum' => 'postscriptum',
        'hell let loose' => 'hll',
        'battalion 1944' => 'batt1944',
        'project reality' => 'projectrealitybf2',
        
        // Battlefield
        'battlefield 2' => 'bf2',
        'battlefield 3' => 'bf3',
        'battlefield 4' => 'bf4',
        'battlefield 1942' => 'bf1942',
        'battlefield: bad company 2' => 'bfbc2',
        'battlefield hardline' => 'bfh',
        
        // Call of Duty
        'call of duty 4' => 'cod4',
        'call of duty 2' => 'cod2',
        'call of duty: modern warfare 2' => 'codmw2',
        'call of duty: modern warfare 3' => 'codmw3',
        'call of duty: world at war' => 'codwaw',
        
        // Space Games
        'space engineers' => 'spaceengineers',
        'starmade' => 'starmade',
        'atlas' => 'atlas',
        
        // Sandbox
        'terraria' => 'terraria',
        'tshock' => 'tshock',
        
        // GTA
        'san andreas multiplayer' => 'samp',
        'sa-mp' => 'samp',
        'multi theft auto' => 'mta',
        'fivem' => 'cfx',
        'redm' => 'cfx',
        
        // Other Popular
        'mordhau' => 'mordhau',
        'project zomboid' => 'zomboid',
        'unreal tournament' => 'ut',
        'unreal tournament 2004' => 'ut2004',
        'red orchestra 2' => 'redorchestra2',
        'rising storm 2' => 'risingstorm2',
        
        // Voice Servers
        'teamspeak 3' => 'teamspeak3',
        'mumble' => 'mumble',
    ];

    /**
     * Query port offsets for games that need them
     * Key: query_type, Value: port offset
     */
    protected array $queryPortOffsets = [
        'rust' => 1,
        'arkse' => 1,
        'arksa' => 1,
        'squad' => 1,
        'hll' => 1,
        'postscriptum' => 1,
        'mordhau' => 1,
        'vrising' => 1,
        'valheim' => 1,
        'conanexiles' => 1,
        'sevendaystodie' => 1,
        'theforrest' => 1,
        'miscreated' => 1,
        'eco' => 1,
        'stationeers' => 1,
        'barotrauma' => 1,
        'projectzomboid' => 1,
    ];

    public function run(): void
    {
        $processedCount = 0;
        $skippedCount = 0;

        foreach (Egg::all() as $egg) {
            $queryType = $this->detectQueryType($egg);
            
            if ($queryType) {
                // Get the port offset if defined for this query type
                $portOffset = $this->queryPortOffsets[$queryType] ?? null;
                
                // Create or update the game query with port offset
                $gameQuery = GameQuery::firstOrCreate(
                    ['query_type' => $queryType],
                    ['query_port_offset' => $portOffset]
                );
                
                // Update port offset if it was created without it
                if ($portOffset !== null && $gameQuery->query_port_offset !== $portOffset) {
                    $gameQuery->update(['query_port_offset' => $portOffset]);
                }
                
                EggGameQuery::firstOrCreate([
                    'egg_id' => $egg->id,
                ], [
                    'game_query_id' => $gameQuery->id,
                ]);
                
                $processedCount++;
                
                // @phpstan-ignore if.alwaysTrue
                if ($this->command) {
                    $offsetInfo = $portOffset ? " (offset: +{$portOffset})" : "";
                    $this->command->info("Linked egg '{$egg->name}' to query type '{$queryType}'{$offsetInfo}");
                }
            } else {
                $skippedCount++;
            }
        }

        // @phpstan-ignore if.alwaysTrue
        if ($this->command) {
            $this->command->info("Processed {$processedCount} eggs, skipped {$skippedCount} eggs");
        }
    }

    /**
     * Detect the query type for an egg based on name and tags
     */
    protected function detectQueryType(Egg $egg): ?string
    {
        $eggName = strtolower($egg->name);
        $tags = array_map('strtolower', $egg->tags ?? []);

        // First, try exact name matching
        foreach ($this->eggMappings as $pattern => $queryType) {
            if (str_contains($eggName, $pattern)) {
                return $queryType;
            }
        }

        // Then try tag-based detection
        if (in_array('minecraft', $tags)) {
            if (str_contains($eggName, 'bedrock') || str_contains($eggName, 'pocket')) {
                return 'minecraftbe';
            }
            return 'minecraft';
        }

        if (in_array('source', $tags) || in_array('source_engine', $tags)) {
            // Special cases for Source engine games
            if (str_contains($eggName, 'rust')) {
                return 'rust';
            }
            return 'source';
        }

        if (in_array('voice_servers', $tags) || in_array('voice', $tags)) {
            if (str_contains($eggName, 'teamspeak')) {
                return 'teamspeak3';
            }
            if (str_contains($eggName, 'mumble')) {
                return 'mumble';
            }
        }

        return null;
    }
}
