uri: {host}/api/ticket/c.php

method: POST

### request example

| 欄位        | 說明       |                                        |
| ----------- | ---------- | -------------------------------------- |
| uid         | 使用者     |                                        |
| ticket_name | 工單名稱   |                                        |
| priority    | 優先權     |                                        |
| dept        | 指派部門   |                                        |
| stall       | 攤提部門   |                                        |
| contact     | 聯絡人員   |                                        |
| ext         | 分機號碼   |                                        |
| impact      | 影響範圍   |                                        |
| application | 用途       |                                        |
| hm          | 上架資訊   |                                        |
| location    | 機房位置   | SZ, AS, HK, TP, SH, CQ, 大陸, AWS, GCP |
| ip          | 連線IP     |                                        |
| m_type      | 機器類型   | v(虛擬機), r(實體機)                   |
| os          | 作業系統   | w(Windows), l(Linux), e(Esxi)          |
| hostname    | 主機名稱   |                                        |
| c_serial    | 流水號     |                                        |
| m_serial    | 實體機序號 |                                        |
| dept        | 請購者     |                                        |
| test        | 用途       | t, p                                   |
| test_time   | 測試時間   |                                        |
| port        | 監控PORT   |                                        |
| note        | 備註       |                                        |


```json
{
  "token": "token",
  "uid": "api",
  "ticket_name": "測試單",
  "priority": "不緊急，不重要",
  "dept": [
    "DC-CS",
    "DC-SYS",
    "DC-OP"
  ],
  "stall": [
    "CYG"
  ],
  "contact": "tester",
  "ext": "0000",
  "impact": "testing",
  "application": "testing",
  "hm": {
    "location": "SZ",
    "ip": "127.0.0.1",
    "m_type": "v",
    "os": "l",
    "hostname": "test",
    "c_serial": "test01",
    "m_serial": "VM",
    "dept": "RD1",
    "test": "t",
    "test_time": "2019-06-01",
    "port": "80T"
  },
  "note":"test ticket"
}
```

### response example

```json
{
  "result": "ok",
  "id": "DC-T2019062406",
}
```
