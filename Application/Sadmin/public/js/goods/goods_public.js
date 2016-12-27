var goods = {
    specList: [],
    init: function() {
        _this = this;
        $('.chosen-group').chosen({
            allow_single_deselect: true,
            search_contains: true,
            disable_search_threshold: 10,
        });
        this.delSpecInit();
        $('.layer_notice').addClass('hide');

        $('#add-spec').on('click', function() {
            parent.layer.prompt({
                title: '规格名'
            }, function(value, index, elem) {
                _this.addSpecNew(value);
                parent.layer.close(index);
            });
            return;

            $('.layer_notice').removeClass('hide');
            //捕获页
            layer.open({
                type: 1,
                shade: 0.5,
                btn: ['确定', '取消'],
                yes: function(index, layero) {
                    var specName = $('#spec-name').val();
                    var specValues = $('#spec-values').val();
                    // console.info(specValues);
                    _this.addSpec(specName, specValues);
                    layer.close(index);
                },
                btn2: function(index, layero) {
                    $('.layer_notice').addClass('hide');
                },
                area: ['30%', '30%'],
                title: "添加规格", //不显示标题
                content: $('.layer_notice'), //捕获的元素

            });
        });
        $('#add-spec-value').on('click', function() {
            _this.addSpecValue();
        });
        $('[data-rel=popover]').popover({ container: '.layer_notice' });
        $('#submit').on('click', function() {
            _this.submitInfo();
        });

        $("#add-property").click(function() {
            $(".property").css("display", "block");
            $("tbody.properties").append('<tr><td><input type="text" class="property-name"></td><td><input type="text" class="property-value"></td><td><button  type="button" class="btn btn-xs btn-danger" onclick="_this.deleteProperty(this)"><i class="ace-icon fa fa-trash-o bigger-110"></i> 删除</button></td></tr>');
        })
    },


    deleteProperty: function(obj) {
        var trNode = $(obj).parents('tr');
        trNode.remove();
    },
    addSpecValue: function() {
        _this = this;
        //先检查是否存在规格名称
        var existIndex = -1;
        $('#spec-table').find('thead tr th.spec-name-head').each(function(index) {
            existIndex = 1;
            return;
        });
        if (existIndex == -1) {
            parent.layer.alert('请先添加规格名');
            return false;
        }
        //添加空白行
        var trHtml = '<td><input class="col-xs-9 spec-sn" type="text" ></td><td><input class="col-xs-9 spec-price" type="text" ></td><td><button type="button" class="btn btn-xs btn-danger" onclick="_this.deleteLocalSpec(this)"><i class="ace-icon fa fa-trash-o bigger-110"></i> 删除</button></td>';
        var specValueTdHtml = '';
        $('#spec-table').find('thead tr th.spec-name-head').each(function(index) {
            var specName = $(this).text();
            specValueTdHtml += '<td spec-name="' + specName + '"><input class="col-xs-9 spec-value" value="" type="text"></td>';
        });
        specValueTdHtml = specValueTdHtml + trHtml;
        $('#spec-table').find('tbody').prepend('<tr class="ff">' + specValueTdHtml + '</tr>');
    },
    addSpecNew: function(specName) {
        var existIndex = -1;
        $('#spec-table').find('thead tr th.spec-name-head').each(function(index) {
            // console.info(index);
            if ($(this).text() == specName) {
                existIndex = index;
            }
        });
        if (existIndex != -1) {
            parent.layer.alert('规格名已存在');
            return;
        }
        //新增规格
        var specTableHead = $('#spec-table').find('thead tr');
        specTableHead.prepend('<th class="spec-name-head" id="deleteTh">' + specName + '</th>');
        $('#spec-table').find('tbody tr').each(function(bodyIndex) {
            var tdHtml = '<td spec-name="' + specName + '"><input class="col-xs-9 spec-value" value="" type="text"></td>';
            $(this).html(tdHtml + $(this).html());
        });
    },
    deleteLocalSpec: function(obj) {
        var trNode = $(obj).parents('tr');
        trNode.remove();
    },
    addSpec: function(specName, specValues) {
        var sepcValuesStr = specValues.replace('，', ',');
        var specValueArr = sepcValuesStr.split(',');
        var existIndex = -1;
        $('#spec-table').find('thead tr th.spec-name-head').each(function(index) {
            // console.info(index);
            if ($(this).text() == specName) {
                existIndex = index;
            }
        });
        var trHtml = '<td><input class="col-xs-9 spec-sn" type="text" ></td><td><input class="col-xs-9 spec-price" type="text" ></td>';
        var sampleArr = []; //添加规格的样本
        if (existIndex == -1) {
            //新增规格
            var specTableHead = $('#spec-table').find('thead tr');
            specTableHead.prepend('<th class="spec-name-head" id="deleteTh">' + specName + '</th>');

            //增加第一个规格值
            $('#spec-table').find('tbody tr').each(function(bodyIndex) {
                var sampleTr = $(this).prepend('<td spec-name="' + specName + '">' + specValueArr[0] + '</td>');
                sampleArr.push(sampleTr);
            });
            if (sampleArr.length == 0) {
                //本来就没规格
                var i = 1;
                for (var key in specValueArr) {
                    $('#spec-table').find('tbody').prepend('<tr><td spec-name="' + specName + '">' + specValueArr[key] + '</td>' + trHtml + '<td><button id="deleteBtn' + i + '" type="button" class="btn btn-xs btn-danger" onclick="deleteSpace(' + i + ')"><i class="ace-icon fa fa-trash-o bigger-110"></i> 删除</button></td>' + '</tr>');
                    i++;
                }
            } else {
                alert(1);
                for (var key in specValueArr) {
                    var fristSpecName = specValueArr[0];
                    if (key != 0) {
                        for (var keySample in sampleArr) {
                            var addRowHtml = sampleArr[keySample].html().replace(fristSpecName, specValueArr[key]);
                            $('#spec-table').find('tbody').prepend('<tr class="ff">' + addRowHtml + '</tr>');
                        }
                    }
                }
            }
            $('#spec-group').removeClass('hide');
        } else {
            //已有规格
            // this.getSpecValue(specName);
            var i = 1000;
            for (var key in specValueArr) {
                if (!this.isExistSpecValue(specName, specValueArr[key])) {
                    //不存在的添加
                    this.getSpecValue(specName, specValueArr[key], i);
                }
                i--;
            }
            return;
        }
    },

    /**
     * 获取一个规格的规格值模版
     * @return {[type]} [description]
     */
    getSpecValue: function(specName, value, num) {
        var specValue = "";

        $('#spec-table').find('tbody tr').each(function(bodyIndex) {
            var trHtml = '<td><input class="col-xs-9 spec-sn" type="text" ></td><td><input class="col-xs-9 spec-price" type="text" ></td>';
            var isSample = false;
            var tdHtml = "";
            $(this).find('td[spec-name]').each(function() {
                var thisSpecName = $(this).attr('spec-name');
                var thisSpecValue = $(this).text();
                console.info($(this).prop("outerHTML"));
                if (thisSpecName == specName && (specValue == thisSpecValue || !specValue)) {
                    //规格名称相同，值相同或者还没有赋值specValue
                    specValue = thisSpecValue;
                    isSample = true;
                    tdHtml += '<td spec-name="' + specName + '">' + value + '</td>';

                } else {
                    tdHtml += $(this).prop("outerHTML");
                }
            });
            if (isSample) {
                trHtml = '<tr>' + tdHtml + trHtml + '<td><button id="deleteBtn' + num + '" type="button" class="btn btn-xs btn-danger" onclick="deleteSpace(' + num + ')"><i class="ace-icon fa fa-trash-o bigger-110"></i> 删除</button></td>' + '</tr>';
                $('#spec-table').find('tbody').prepend(trHtml);
            }
            // console.info($(this).html());
        });
    },

    isExistSpecValue: function(specName, specValue) {
        var result = false;
        $('#spec-table').find('td[spec-name=' + specName + ']').each(function() {
            if ($(this).text() == specValue) {
                result = true;
                return false;
            }
        });
        return result;
    },


    delSpecInit: function() {
        var goodsIdArr = [];
        $('.del-spec').on('click', function() {
            // var trNode = $(this).parents('tr');
            // var goodsId = trNode.attr('goods-id');
            // if (goodsId) {
            //     $.ajax({
            //         url: delGoodsUrl,
            //         type: 'post',
            //         dataType: 'json',
            //         data: { goodsId: goodsId },
            //         success: function(result) {
            //             if (result.status == 1) {
            //                 layer.msg('删 除 成 功');
            //                 trNode.remove();
            //             } else if (result.status == 0) {
            //                 layer.alert(result.info);
            //             }
            //         }
            //     });
            // } else {
            //     trNode.remove();
            // }
            
            var trNode = $(this).parents('tr');
            var goodsId = trNode.attr('goods-id');//删除规格的id
            goodsIdArr.push(goodsId);
            $('#delGoodsId').val(goodsIdArr); 
            trNode.remove();
        });
    },

    submitInfo: function() {

        var submitFlag = true; //是否提交的标志
        var goodsInfo = {};
        if (goodsId) {
            goodsInfo.goodsId = goodsId;
        }
        if (goodsParentId) {
            goodsInfo.goodsParentId = goodsParentId;
        }
        goodsInfo.delGoodsId = $('#delGoodsId').val();
        goodsInfo.goodsName = $('#goods-name').val();
        goodsInfo.catId = $('#cat-id').val();
        goodsInfo.brandId = $('#brand-id').val();
        goodsInfo.goodsPrice = $('#goods-price').val();
        goodsInfo.goodsSn = $('#goods-sn').val();
        goodsInfo.goodsUnit = $('#goods-unit').val();
        goodsInfo.goodsPrice = $('#goods-price').val();
        // goodsInfo.goodsPropertyName = $('#properties-name').val();
        // goodsInfo.goodsPropertyValue = $('#properties-value').val();
        goodsInfo.goodsDesc = um.getContent();

        var propertyArr = [];
        var propertyList = [];
        $("tbody.properties tr").each(function() {
            var propertyInfo = {};
            propertyInfo.specName = $(this).find('td input.property-name').val();
            propertyInfo.specValue = $(this).find('td input.property-value').val();
            propertyList.push(propertyInfo);
        });
        goodsInfo.propertyList = propertyList;
        // console.log(propertyList);

        var specArr = [];
        $('#spec-table tbody tr').each(function() {
            var specTr = {};
            var specInfoList = [];
            $(this).find('td[spec-name]').each(function() {
                var specInfo = {};
                specInfo.specName = $(this).attr('spec-name');
                specInfo.specValue = $(this).find('input').val();
                if (!specInfo.specValue) {
                    parent.layer.alert('规格值不能为空');
                    submitFlag = false;
                }
                specInfoList.push(specInfo);
                // console.log(specInfoList);
            });

            specTr.specInfoList = specInfoList;
            // console.log(specTr);
            specTr.specSn = $(this).find('.spec-sn').val();
            if (!specTr.specSn) {
                parent.layer.alert('商品编码不能为空');
                submitFlag = false;
            }
            specTr.specPrice = $(this).find('.spec-price').val();
            if ($(this).attr('goods-id')) {
                specTr.goodsId = $(this).attr('goods-id');
            }
            specArr.push(specTr);
        });

        if (specArr.length == 0) {
            submitFlag = false;
            parent.layer.alert('至少需要有一条规格数据');
        }
        if (!submitFlag) {
            return false;
        }

        goodsInfo.specArr = specArr;
        // var loadingIndex = parent.layer.load(0, {
        //     shade: [0.1, '#fff'] //0.1透明度的白色背景
        // });

        $.ajax({
            url: editTemplatesUrl,
            type: 'post',
            dataType: 'json',
            data: goodsInfo,
            success: function(result) {
                // parent.layer.close(loadingIndex);
                if (result.status == 1) {
                    parent.ifm.contentWindow.table.api().ajax.reload();
                    parent.layer.msg(result.info);
                    parent.layer.closeAll('iframe');
                } else if (result.status == 0) {
                    layer.alert(result.info, { icon: 6 });
                }
            },
            error: function(result) {
                layer.alert(result.info, { icon: 6 });
            }
        });
    }

};
