[
    {
        name: util.icon("icon-waibuduijie") + " 对接配置",
        form: [
            {
                title: "接口版本",
                name: "version",
                type: "radio",
                dict: [
                    {id: 0, name: "V1"},
                    {id: 1, name: "V2"}
                ],
                change: (form, val) => {
                    if (val == 1) {
                        form.show('platform_public_key');
                        form.show('private_key');
                        form.hide('key');
                    } else {
                        form.hide('platform_public_key');
                        form.hide('private_key');
                        form.show('key');
                    }
                }
            },
            {
                title: "接口地址",
                name: "url",
                type: "input",
                placeholder: "支付接口地址(如:https://abcedf.com)"
            },
            {
                title: "商户ID",
                name: "pid",
                type: "input",
                placeholder: "请输入商户ID"
            },
            {
                title: "商户密钥",
                name: "key",
                type: "input",
                placeholder: "请输入商户密钥",
                hide: assign?.version == 1
            },
            {
                title: "平台公钥",
                name: "platform_public_key",
                type: "textarea",
                placeholder: "请输入平台公钥",
                hide: assign?.version != 1,
                height: 60
            },
            {
                title: "商户私钥",
                name: "private_key",
                type: "textarea",
                placeholder: "请输入商户私钥",
                hide: assign?.version != 1,
                height: 60
            },
            {
                title: "MAPI",
                name: "mapi",
                type: "switch",
                tips: "如果对方系统支持MAPI，那么可以启用这个，可以大幅度提高通讯安全"
            }
        ]
    }
]