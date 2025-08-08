# AutoRecon

**AutoReconnectPM** is a PocketMine-MP 5.x plugin that ensures a smooth player experience by automatically reconnecting players to a server when the current one shuts down

## To the person reviewing this plugin
- Please unban me from pocketmine discord, i deeply regret my actions. PLZ UNBAN
- (discord @trix.pro)

## 🔧 Features

- 🔁 Reconnects players to the **same server** after restart
- 🌐 Alternatively, connect to a **specified server IP and port**
- ⚙️ Clean and simple `config.yml` with optional debug messages
- ✅ Designed for production networks with frequent server restarts (e.g., minigames, temporary worlds)

## ⚙️ Configuration

```yaml
# Automatically reconnect players to the same server (requires proxy support)
auto-reconnect: true

# Enable debug logging
debug-messages: true

# Target server details (used only if auto-reconnect is false)
query:
  ip-address: sukomc.net
  port: 19132
