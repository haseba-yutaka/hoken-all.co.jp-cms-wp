
（本番）管理画面
https://hoken-all.co.jp/cms/login_hoken-all

（STG）管理画面
http://stg2.hoken-all.co.jp/wp/wp-admin

ベーシック認証（stg2.hoken-all.co.jp/wp/）
id: test
pw: test

----------------------------------------

テンプレートのphp（Wordpressで管理しないLP用とか）
https://hoken-all.co.jp/cms/wp-content/themes/template.php


scss のコンパイル（jsは、運用の観点からbuildしておりません）
「テーマディレクトリ」と「global-assets」を、Prepros（プリプロス）に、D&D（ドラック&ドロップ）するだけ。

Preprosのやり方
https://b-risk.jp/blog/2020/09/start-using-prepros-practice/

※ 補足
nodeをInstallしてなくても動く。
吐き出される、「prepros.config」は、削除してもOK。（PCによって中身が違います。）
「global-assets」は、意図的に「テーマディレクトリ」から外しております。
Wordpressで管理しない、LPとかを作る可能性もあるため。