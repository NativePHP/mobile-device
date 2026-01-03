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
```

### JavaScript (Vue/React/Inertia)

```js
import { device } from '#nativephp';

// Vibrate the device
await device.vibrate();

// Toggle flashlight
const flashResult = await device.toggleFlashlight();
console.log('Flashlight state:', flashResult.state);

// Get device ID
const idResult = await device.getId();
console.log('Device ID:', idResult.id);

// Get device info
const infoResult = await device.getInfo();
const info = JSON.parse(infoResult.info);
console.log('Platform:', info.platform);

// Get battery info
const batteryResult = await device.getBatteryInfo();
const battery = JSON.parse(batteryResult.info);
console.log('Battery level:', battery.batteryLevel * 100 + '%');
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

## Permissions

### Android
- `android.permission.VIBRATE` - For vibration
- `android.permission.FLASHLIGHT` - For flashlight control

### iOS
No special permissions required.

## License

MIT
