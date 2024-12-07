[
    {
        name: util.icon("icon-waibuduijie") + " TokenPay配置",
        form: [
            {
                title: "API接口地址",
                name: "apiUrl",
                type: "input",
                placeholder: "TokenPay接口地址(如:https://token-pay.xxx.com)",
                tips: "以http://或https://开头，末尾不要有斜线",
                required: true,
                validate: (value) => {
                    if (!value.startsWith('http://') && !value.startsWith('https://')) {
                        return '请输入正确的URL格式';
                    }
                    return true;
                }
            },
            {
                title: "API密钥",
                name: "apiKey",
                type: "input",
                placeholder: "请输入TokenPay API密钥",
                tips: "在TokenPay平台获取的API密钥",
                required: true
            }
        ]
    }
]