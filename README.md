# My Snow Monkey とは

[Snow Monkey](https://snow-monkey.2inc.org/) 専用のプラグインを指します。

Snow Monkey では公式で子テーマでのカスタマイズは推奨されていないので、このようなプラグインで対応する方針となっています。
https://snow-monkey.2inc.org/2019/02/04/my-snow-monkey-plugin/

子テーマの `functions.php` にカスタマイズコードを追加するように、このプラグインの `my-snow-monkey.php` に書くと、同じようにカスタマイズが反映されます。

My Snow Monkey では Snow Monkey の Theme に関するカスタマイズに留める設計がおすすめです。

### 注意事項

`wp-content/plugin/`に設置して開発してください。

予め Snow Monkey インストールをして開発してください。

## リポジトリ URL

https://github.com/contiki9/my-snow-monkey.git

## 定数

下記の定数が利用可能です。

### MY_SNOW_MONKEY_URL

My Snow Monkey プラグインディレクトリへの URL

### MY_SNOW_MONKEY_PATH

My Snow Monkey プラグインディレクトリへの ファイルパス

### SCSS の Build

`npm i` を実行（初回のみ）

`npx gulp`で scss をウォッチして build します。
