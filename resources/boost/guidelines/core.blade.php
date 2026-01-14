## nativephp/device

Device hardware operations including vibration, flashlight, device info, and battery status.

### PHP Usage (Livewire/Blade)

@verbatim
<code-snippet name="Device Operations" lang="php">
use Native\Mobile\Facades\Device;

// Get unique device ID
$id = Device::getId();

// Get device info (JSON)
$info = Device::getInfo();
$deviceInfo = json_decode($info);
// $deviceInfo->platform, $deviceInfo->model, $deviceInfo->osVersion

// Vibrate the device
Device::vibrate();

// Toggle flashlight
$result = Device::flashlight();
// result.state = true (on) or false (off)

// Get battery info
$batteryInfo = Device::getBatteryInfo();
// batteryLevel: 0-1 (e.g., 0.85 = 85%), isCharging: true/false
</code-snippet>
@endverbatim

### JavaScript Usage (Vue/React/Inertia)

@verbatim
<code-snippet name="Device Operations in JavaScript" lang="javascript">
import { device } from '#nativephp';

// Get unique device ID
const result = await device.getId();
const deviceId = result.id;

// Get device info
const infoResult = await device.getInfo();
const deviceInfo = JSON.parse(infoResult.info);
console.log(deviceInfo.platform);  // 'ios' or 'android'
console.log(deviceInfo.model);     // e.g., 'iPhone13,4'
console.log(deviceInfo.osVersion); // e.g., '17.0'

// Vibrate the device
await device.vibrate();

// Toggle flashlight
const flashResult = await device.flashlight();
console.log(flashResult.state); // true = on, false = off

// Get battery info
const batteryResult = await device.getBatteryInfo();
const battery = JSON.parse(batteryResult.info);
console.log(batteryResult.batteryLevel); // 0-1
console.log(batteryResult.isCharging);   // true/false
</code-snippet>
@endverbatim

### Device Info Properties

| Property | Type | Description |
|----------|------|-------------|
| name | string | Device name |
| model | string | Device model identifier |
| platform | 'ios' \| 'android' | Operating platform |
| osVersion | string | OS version string |
| isVirtual | boolean | Running in simulator/emulator |
| memUsed | number | App memory usage in bytes |
| webViewVersion | string | Browser version |

### Battery Info Properties

| Property | Type | Description |
|----------|------|-------------|
| batteryLevel | number | Charge percentage (0-1) |
| isCharging | boolean | Current charging status |