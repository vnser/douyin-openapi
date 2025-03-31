- 本包是根据ydg/douyin-open-sdk修改而来，感谢作者的辛苦付出~
- 本包是再次根据vring/douyin-openapi修改而来，感谢作者的辛苦付出~

#### 新增内容
1，增加抖音来客券码核销功能
2，其他代码优化
3，内置自动获取access_token，优化access_token缓存机制
4，增加流量主广告板块，
````php
<?php
$dy = \vring\DouyinOpenapi\DouyouApp::make('ttbd1ecba05f01','82ac26bc7d1d592755110a9fd40183248c520');
$dy->ad->query_ad_income();
````

