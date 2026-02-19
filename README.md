# Device Plugin for NativePHP Mobile

Device hardware operations including vibration, flashlight, device info, and battery status.

## Overview

The Device API provides access to device hardware features and information.

## Installation

```bash
composer require nativephp/mobile-device
```

## Usage

### PHP (Livewire/Blade)

```php
use Native\Mobile\Facades\Device;

// Vibrate the device
Device::vibrate();

// Toggle flashlight
$result = Device::toggleFlashlight();
// Returns: ['success' => true, 'state' => true|false]

// Get device ID
$result = Device::getId();
// Returns: ['id' => 'unique-device-id']

// Get device info
$result = Device::getInfo();
// Returns: ['info' => '{"name":"iPhone","model":"iPhone","platform":"ios",...}']

// Get battery info
$result = Device::getBatteryInfo();
// Returns: ['info' => '{"batteryLevel":0.85,"isCharging":false}']

// Get localization info
$localization = Device::localization();
// Returns DeviceLocale object: $localization->locale, $localization->languageCode, etc.
```

### JavaScript (Vue/React/Inertia)

```js
import { Device } from '#nativephp';

// Vibrate the device
await Device.vibrate();

// Toggle flashlight
const flashResult = await Device.toggleFlashlight();
console.log('Flashlight state:', flashResult.state);

// Get device ID
const idResult = await Device.getId();
console.log('Device ID:', idResult.id);

// Get device info
const infoResult = await Device.getInfo();
const info = JSON.parse(infoResult.info);
console.log('Platform:', info.platform);

// Get battery info
const batteryResult = await Device.getBatteryInfo();
const battery = JSON.parse(batteryResult.info);
console.log('Battery level:', battery.batteryLevel * 100 + '%');

// Get localization info
const localeResult = await Device.getLocale();
const localization = JSON.parse(localeResult.info);
console.log('Language:', localization.languageCode);
console.log('Timezone:', localization.timezone);
```

## Methods

### `vibrate(): array`

Vibrate the device.

**Returns:** `{ success: true }`

### `toggleFlashlight(): array`

Toggle the device flashlight on/off.

**Returns:** `{ success: boolean, state: boolean }`

### `getId(): array`

Get the unique device identifier.

**Returns:** `{ id: string }`

- iOS: Uses `identifierForVendor` UUID
- Android: Uses `ANDROID_ID`

### `getInfo(): array`

Get detailed device information.

**Returns:** `{ info: string }` (JSON string)

Device info includes:
- `name` - Device name
- `model` - Device model
- `platform` - "ios" or "android"
- `operatingSystem` - OS name
- `osVersion` - OS version string
- `manufacturer` - Device manufacturer
- `isVirtual` - Whether running in simulator/emulator
- `memUsed` - Memory usage in bytes
- `webViewVersion` - WebView version

### `getBatteryInfo(): array`

Get battery level and charging status.

**Returns:** `{ info: string }` (JSON string)

Battery info includes:
- `batteryLevel` - Battery level from 0.0 to 1.0
- `isCharging` - Whether device is charging

### `localization(): DeviceLocale`

Get device locale and regional settings.

**Returns:** `DeviceLocale` object (PHP) / `{ info: string }` JSON string (JS)

Localization info includes:
- `locale` - Full locale identifier (e.g., "en_GB")
- `languageCode` - Language code (e.g., "en")
- `regionCode` - Region/country code (e.g., "GB")
- `timezone` - Timezone identifier (e.g., "America/New_York")
- `currencyCode` - Currency code (e.g., "GBP")
- `preferredLanguage` - User's preferred language (e.g., "en-GB")

## Permissions

### Android
- `android.permission.VIBRATE` - For vibration
- `android.permission.FLASHLIGHT` - For flashlight control

### iOS
No special permissions required.
