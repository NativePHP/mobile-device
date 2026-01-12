## nativephp/device

Device hardware operations including vibration, flashlight, device info, and battery status.

### Installation

```bash
composer require nativephp/device
php artisan native:plugin:register nativephp/device
```

### PHP Usage (Livewire/Blade)

Use the `Device` facade:

@verbatim
<code-snippet name="Device Operations" lang="php">
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
// Returns JSON with name, model, platform, osVersion, etc.

// Get battery info
$result = Device::getBatteryInfo();
// Returns JSON with batteryLevel (0.0-1.0) and isCharging
</code-snippet>
@endverbatim

### JavaScript Usage

@verbatim
<code-snippet name="Device Operations in JavaScript" lang="js">
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
console.log('Battery level:', Math.round(battery.batteryLevel * 100) + '%');
</code-snippet>
@endverbatim

### Available Methods

- `Device::vibrate()` - Vibrate the device
- `Device::toggleFlashlight()` - Toggle flashlight on/off, returns state
- `Device::getId()` - Get unique device identifier
- `Device::getInfo()` - Get detailed device information (JSON)
- `Device::getBatteryInfo()` - Get battery level and charging status (JSON)

### Device Info Properties

The `getInfo()` method returns JSON containing:
- `name` - Device name
- `model` - Device model
- `platform` - "ios" or "android"
- `operatingSystem` - OS name
- `osVersion` - OS version string
- `manufacturer` - Device manufacturer
- `isVirtual` - Whether running in simulator/emulator
- `memUsed` - Memory usage in bytes
- `webViewVersion` - WebView version

### Battery Info Properties

The `getBatteryInfo()` method returns JSON containing:
- `batteryLevel` - Battery level from 0.0 to 1.0
- `isCharging` - Whether device is charging

### Platform Details

- **iOS**: Uses UIDevice for info, AVCaptureDevice for flashlight
- **Android**: Uses Build class for info, CameraManager for flashlight
- Vibration uses standard platform APIs
