import{S as i}from"./LogoGear.fa7af154.js";import{n as o}from"./vueComponentNormalizer.58b0a173.js";var a=function(){var t=this,n=t.$createElement,s=t._self._c||n;return s("div",{staticClass:"aioseo-api-bar"},[s("div",{staticClass:"upgrade-text"},[s("svg-aioseo-logo-gear"),s("div",{domProps:{innerHTML:t._s(t.upgradeText)}})],1)])},l=[];const c={components:{SvgAioseoLogoGear:i},data(){return{strings:{boldText:this.$t.sprintf("<strong>%1$s %2$s</strong>","AIOSEO",this.$isPro?"Pro":""),linkText:this.$t.__("Click here to learn more",this.$td)}}},computed:{link(){return this.$t.sprintf('<strong><a href="%1$s" target="_blank" class="text-white">%2$s</a></strong>',this.$links.getDocUrl("restApi"),this.strings.linkText)},upgradeText(){return this.$t.sprintf(this.$t.__("%1$s relies on the WordPress Rest API and your site might have it disabled. %2$s.",this.$td),this.strings.boldText,this.link)}},mounted(){document.body.classList.add("aioseo-has-bar")},beforeDestroy(){document.body.classList.remove("aioseo-has-bar")}},e={};var u=o(c,a,l,!1,_,null,null,null);function _(t){for(let n in e)this[n]=e[n]}const $=function(){return u.exports}();var p=function(){var t=this,n=t.$createElement,s=t._self._c||n;return s("div")},d=[];const v={},r={};var f=o(v,p,d,!1,h,null,null,null);function h(t){for(let n in r)this[n]=r[n]}const x=function(){return f.exports}();export{$ as C,x as a};
