/*! jquery.add-input-area v4.11.0 | Yuusaku Miyazaki <toumin.m7@gmail.com> | license: MIT */ ! function(t) {
    var e = {};

    function n(i) {
        if (e[i]) return e[i].exports;
        var a = e[i] = {
            i: i,
            l: !1,
            exports: {}
        };
        return t[i].call(a.exports, a, a.exports, n), a.l = !0, a.exports
    }
    n.m = t, n.c = e, n.d = function(t, e, i) {
        n.o(t, e) || Object.defineProperty(t, e, {
            enumerable: !0,
            get: i
        })
    }, n.r = function(t) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(t, "__esModule", {
            value: !0
        })
    }, n.t = function(t, e) {
        if (1 & e && (t = n(t)), 8 & e) return t;
        if (4 & e && "object" == typeof t && t && t.__esModule) return t;
        var i = Object.create(null);
        if (n.r(i), Object.defineProperty(i, "default", {
                enumerable: !0,
                value: t
            }), 2 & e && "string" != typeof t)
            for (var a in t) n.d(i, a, function(e) {
                return t[e]
            }.bind(null, a));
        return i
    }, n.n = function(t) {
        var e = t && t.__esModule ? function() {
            return t.default
        } : function() {
            return t
        };
        return n.d(e, "a", e), e
    }, n.o = function(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, n.p = "", n(n.s = 0)
}([function(t, e, n) {
    "use strict";
    n.r(e);
    var i = {
        _setOption: function(t, e) {
            return (t = $.extend({
                btn_del: e ? "." + e + "_del" : ".aia_del",
                btn_add: e ? "." + e + "_add" : ".aia_add",
                area_var: e ? "." + e + "_var" : ".aia_var",
                area_del: null,
                after_add: null,
                clone_event: !0,
                maximum: 0,
                dont_clone: null,
                validate: null,
                populated_data:e ? e: []
            }, t)).area_del || (t.area_del = t.btn_del), t
        },
        _setDelBtnVisibility: function() {
            1 == $(this.elem).find(this.option.area_var).length 
            && $(this.elem).find(this.option.area_del).hide()
        },
        _ehAddBtn: function() {
            this.option.validate 
            && !this.option.validate() 
            || (this._addNewArea(), 
            $(this.elem).find(this.option.area_del).show(), 
            this.option.maximum > 0 && 
            $(this.elem).find(this.option.area_var).length >= this.option.maximum 
            && $(this.option.btn_add).hide(), 
            "function" == typeof this.option.after_add 
            && this.option.after_add())
        },
        _addNewArea: function() {
            var t = $(this.elem).find(this.option.area_var).length,
                e = $(this.option.original).clone(!0);
            this._renumberFieldEach(t, e);
            var n = this;
            $(e).find("[name]").each(function() {
                n._initFieldVal.call(n, this)
            }).end().appendTo(this.elem)
        },
        _initFieldVal: function(t) {
            return "false" != $(t).attr("empty_val") 
            && "false" != $(t).attr("data-empty-val") 
            && ("checkbox" == $(t).attr("type") || "radio" == $(t).attr("type") ? t.checked = !1 : "SELECT" != $(t).prop("tagName") 
            && "submit" != $(t).attr("type") 
            && "reset" != $(t).attr("type") 
            && "image" != $(t).attr("type") 
            && "button" != $(t).attr("type") 
            && $(t).val(""), !0)
        },
        _ehDelBtn: function(t) {
            t.preventDefault();
            var e = $(this.elem).find(this.option.btn_del).index(t.currentTarget);
            $(this.elem).find(this.option.area_var).eq(e).remove(), this._setDelBtnVisibility(), this._renumberFieldAll(), this.option.maximum > 0 && $(this.elem).find(this.option.area_var).length < this.option.maximum && $(this.option.btn_add).show()
        },
        _renumberFieldAll: function() {
            var t = this;
            $(this.elem).find(this.option.area_var).each(function(e, n) {
                t._renumberFieldEach.call(t, e, n)
            })
        },
        _renumberFieldEach: function(t, e) {
            var n = this;
            $(e).find("[name]").each(function() {
                $(this).attr("name", n._getValOfAttr(this, t, "name")), $(this).attr("id", n._getValOfAttr(this, t, "id"))
            }).end().find("[for]").each(function() {
                $(this).attr("for", n._getValOfAttr(this, t, "for"))
            })
        },
        _getValOfAttr: function(t, e, n) {
            var i, a = !1;
            /^.+_\d+$/.test($(t).attr(n)) ? a = $(t).attr(n).replace(/^(.+_)\d+$/, "$1" + e) : (i = "name" == n ? $(t).attr("name_format") || $(t).attr("data-name-format") : $(t).attr("id_format") || $(t).attr("data-id-format")) && (a = i.replace("%d", e));
            return a
        }
    };
    $.fn.addInputArea = function(t) {
        var n = this;


        return this.each(function() {
            new $.addInputArea(this, t)
        })
    }, $.addInputArea = function(t, e) {
        this.elem = t, 
        this.option = this._setOption(e, $(this.elem).attr("id")), 
        this._setDelBtnVisibility();
        //console.log(this.option);

        var n = this;
        //console.log('previous_data'+n.option.populated_data);

        //if(n.option.populated_data !== undefined 
           // && Array.isArray(n.option.populated_data.data)){
        /*
        if(n.option.populated_data !== undefined  && n.option.populated_data > 0){
            //console.log('previous_data'+n.option.populated_data.length);
            //var area_var_len = $(this.elem).find(this.option.area_var).length;
            //console.log('area_var'+area_var_len);
            //var actual_len = Math.abs(n.option.populated_data - area_var_len)
            //;
            var actual_len =n.option.populated_data;
            console.log(actual_len); 
            if(actual_len > 0){
                $(n.option.btn_add).removeAttr('disabled','disabled');
                //console.log($(this.elem).find(this.option.area_var));
                
                while(actual_len > 1){
                    var c = $(this.elem).find(this.option.area_var).clone(true);
                    c.appendTo(this.elem);
                    var d = $(this.elem).find(this.option.area_del);
                    d.show();
                    d.removeAttr('disabled','disabled');
                    actual_len--;
                }

                /*$.each(n.option.populated_data.data, function(i,v){
                    //console.log(v.key);
                    //console.log("[name='"+v.key+"']");
                    removeBlockAndFollow(v.value,1);
                    //$("[name='"+v.key+"']").val(v.value);                    

                });*/
                /*var arr = n.option.populated_data.data;
                for(var i=0;i<arr.length;i++){
                    var nr = arr[i];
                    //console.log(nr);
                    var el_nr = $("[name='"+nr.key+"']");
                    //console.log($("[name='"+nr.key+"']").val());
                    if(el_nr.attr("type") == "radio"){
                        //el_nr.val([nr.value]);
                        console.log(el_nr.attr("type"));
                    }
                }*/


                //$(this.elem).find(this.option.area_var).last().remove();
                /*
                
            }
        }*/

        $(document).on("click", this.option.btn_add, function() {
            n._ehAddBtn.call(n)
        }), $(n.elem).on("click", n.option.btn_del, function(t) {
            n._ehDelBtn.call(n, t)
        }), this._renumberFieldAll(), 
        this.option.original = $(this.elem).find(this.option.area_var).eq(0).clone(this.option.clone_event), 
        this.option.dont_clone && 
        $(this.option.original).find(this.option.dont_clone).detach()
    }, $.extend($.addInputArea.prototype, i)


}]);