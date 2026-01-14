<?php

namespace Boy132\PlayerCounter\Enums;

use Filament\Support\Contracts\HasLabel;

enum GameQueryType: string implements HasLabel
{
    // Source Engine Games
    case Source = 'source';
    case CSGO = 'csgo';
    case CSS = 'css';
    case CS16 = 'cs16';
    case TF2 = 'tf2';
    case L4D = 'l4d';
    case L4D2 = 'l4d2';
    case Gmod = 'gmod';
    case HL2DM = 'hl2dm';
    case DOD = 'dod';
    case DODS = 'dods';
    case BlackMesa = 'blackmesa';
    case Insurgency = 'insurgency';
    case InsurgencySandstorm = 'insurgencysand';
    case KillingFloor = 'killingfloor';
    case KillingFloor2 = 'killingfloor2';
    case NMRIH = 'nmrih';

    // Minecraft
    case MinecraftJava = 'minecraft';
    case MinecraftBedrock = 'minecraftbe';

    // Survival Games
    case Rust = 'rust';
    case ArkSe = 'arkse';
    case ArkSa = 'arksa';
    case Valheim = 'valheim';
    case VRising = 'vrising';
    case SevenDaysToDie = 'sevendaystodie';
    case ConanExiles = 'conanexiles';
    case TheForest = 'theforrest';
    case DayZ = 'dayz';
    case DayZMod = 'dayzmod';
    case Miscreated = 'miscreated';
    case Hurtworld = 'hurtworld';
    case Unturned = 'unturned';
    case LifeIsFeudal = 'lifeisfeudal';
    case Eco = 'eco';
    case Barotrauma = 'barotrauma';
    case Avorion = 'avorion';
    case Stationeers = 'stationeers';
    case Stormworks = 'stormworks';

    // Military Simulators
    case Arma3 = 'arma3';
    case Arma = 'arma';
    case Squad = 'squad';
    case PostScriptum = 'postscriptum';
    case HellLetLoose = 'hll';
    case Battalion1944 = 'batt1944';
    case ProjectReality = 'projectrealitybf2';

    // Battlefield Series
    case BF2 = 'bf2';
    case BF3 = 'bf3';
    case BF4 = 'bf4';
    case BF1942 = 'bf1942';
    case BFBC2 = 'bfbc2';
    case BFH = 'bfh';

    // Call of Duty Series
    case COD = 'cod';
    case COD2 = 'cod2';
    case COD4 = 'cod4';
    case CODMW2 = 'codmw2';
    case CODMW3 = 'codmw3';
    case CODUO = 'coduo';
    case CODWAW = 'codwaw';

    // Space Games
    case SpaceEngineers = 'spaceengineers';
    case Starmade = 'starmade';
    case Atlas = 'atlas';

    // Sandbox/Building
    case Terraria = 'terraria';
    case Tshock = 'tshock';
    case Starbound = 'starbound';

    // GTA/Racing
    case SAMP = 'samp';
    case MultiTheftAuto = 'mta';
    case FiveMRedM = 'cfx';
    case JustCause2 = 'justcause2';
    case JustCause3 = 'justcause3';

    // MMO/RPG
    case Citadel = 'citadel';
    case Contagion = 'contagion';

    // Classic FPS
    case Quake2 = 'quake2';
    case Quake3 = 'quake3';
    case Quake4 = 'quake4';
    case QuakeLive = 'quakelive';
    case Doom3 = 'doom3';
    case UrbanTerror = 'urbanterror';
    case Warsow = 'warsow';
    case SeriousSam = 'serioussam';

    // Unreal Tournament
    case UT = 'ut';
    case UT2004 = 'ut2004';
    case UT3 = 'ut3';
    case Unreal2 = 'unreal2';

    // Star Wars
    case JediAcademy = 'jediacademy';
    case JediOutcast = 'jedioutcast';

    // Other Popular Games
    case RedOrchestra2 = 'redorchestra2';
    case RisingStorm2 = 'risingstorm2';
    case Mordhau = 'mordhau';
    case Pixark = 'pixark';
    case ProjectZomboid = 'zomboid';
    case Soldat = 'soldat';
    case Teeworlds = 'teeworlds';
    case OpenTTD = 'openttd';

    // Voice Servers
    case Teamspeak3 = 'teamspeak3';
    case Teamspeak2 = 'teamspeak2';
    case Mumble = 'mumble';

    public function getLabel(): string
    {
        return match($this) {
            self::ArkSe => 'ARK: Survival Evolved',
            self::ArkSa => 'ARK: Survival Ascended',
            self::SAMP => 'SA:MP',
            self::FiveMRedM => 'FiveM / RedM',
            self::CSGO => 'CS:GO',
            self::CSS => 'CS:Source',
            self::CS16 => 'CS 1.6',
            self::TF2 => 'Team Fortress 2',
            self::L4D => 'Left 4 Dead',
            self::L4D2 => 'Left 4 Dead 2',
            self::Gmod => "Garry's Mod",
            self::HL2DM => 'Half-Life 2: Deathmatch',
            self::DOD => 'Day of Defeat',
            self::DODS => 'Day of Defeat: Source',
            self::NMRIH => 'No More Room in Hell',
            self::BF2 => 'Battlefield 2',
            self::BF3 => 'Battlefield 3',
            self::BF4 => 'Battlefield 4',
            self::BF1942 => 'Battlefield 1942',
            self::BFBC2 => 'Battlefield: Bad Company 2',
            self::BFH => 'Battlefield Hardline',
            self::COD => 'Call of Duty',
            self::COD2 => 'Call of Duty 2',
            self::COD4 => 'Call of Duty 4',
            self::CODMW2 => 'Call of Duty: Modern Warfare 2',
            self::CODMW3 => 'Call of Duty: Modern Warfare 3',
            self::CODUO => 'Call of Duty: United Offensive',
            self::CODWAW => 'Call of Duty: World at War',
            self::UT => 'Unreal Tournament',
            self::UT2004 => 'Unreal Tournament 2004',
            self::UT3 => 'Unreal Tournament 3',
            self::MinecraftJava => 'Minecraft: Java Edition',
            self::MinecraftBedrock => 'Minecraft: Bedrock Edition',
            self::SevenDaysToDie => '7 Days to Die',
            self::HellLetLoose => 'Hell Let Loose',
            self::ProjectZomboid => 'Project Zomboid',
            default => str($this->name)->headline(),
        };
    }

    public function isMinecraft(): bool
    {
        return $this === self::MinecraftJava || $this === self::MinecraftBedrock;
    }

    /**
     * Get the default query port offset for this game type.
     * Returns null if no offset is needed (port = server port).
     * Returns 1 for games that use server port + 1 for queries.
     */
    public function getDefaultQueryPortOffset(): ?int
    {
        return match($this) {
            // Games that use query port = server port + 1
            self::Rust,
            self::ArkSe,
            self::ArkSa,
            self::Squad,
            self::HellLetLoose,
            self::PostScriptum,
            self::Mordhau,
            self::VRising,
            self::Valheim,
            self::ConanExiles,
            self::SevenDaysToDie,
            self::TheForest,
            self::Miscreated,
            self::Eco,
            self::Stationeers,
            self::Barotrauma,
            self::ProjectZomboid => 1,
            
            // All other games use the same port for server and queries
            default => null,
        };
    }
}
