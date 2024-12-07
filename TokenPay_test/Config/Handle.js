[
    {
        name: util.icon("icon-waibuduijie") + " TokenPay配置",
        form: [
            {
                title: "API接口地址",
                name: "apiUrl",
                type: "input",
                placeholder: "TokenPay接口地址(如:https://token-pay.xxx.com)",
                tips: "以http://或https://开头，末尾不要有斜线"
            },
            {
                title: "API密钥",
                name: "apiKey",
                type: "input",
                placeholder: "请输入TokenPay API密钥",
                tips: "在TokenPay平台获取的API密钥"
            },
            {
                title: "支付币种",
                name: "currency",
                type: "select",
                dict: [
                    {id: 'TRX', name: 'TRX'},
                    {id: 'USDT_TRC20', name: 'USDT-TRC20'},
                    {id: 'EVM_ETH_ETH', name: 'ETH'},
                    {id: 'EVM_BSC_BNB', name: 'BSC'},
                    {id: 'EVM_BSC_USDT_BEP20', name: 'BSC-USDT'}
                ],
                tips: "选择要启用的加密货币支付方式"
            }
        ]
    }
]