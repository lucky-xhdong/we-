<template>
  <!--header start-->
  <header class="header-wrapper">
    <div class="header-container">
      <div class="header-left">
        <a href="javascript:;" class="logo"><img src="../../assets/images/header-logo.png" alt="logo" class="img"></a>
      </div>
      <div class="header-right">
        <ul>
          <li class="active"><router-link :to="{path: '/'}" class="txt">首页</router-link></li>
          <li><router-link :to="{path: 'mobile'}" class="txt">移动端</router-link></li>
          <li><router-link :to="{path: 'bigData'}" class="txt">大数据</router-link></li>
          <li><router-link :to="{path: 'mobile'}" class="txt">区块链</router-link></li>
          <li><router-link :to="{path: 'developnews'}" class="txt">开发资讯</router-link></li>
          <li><router-link :to="{path: 'aboutus'}" class="txt">关于</router-link></li>
        </ul>
      </div>
    </div>
  </header>
  <!--header end-->
</template>

<script>
  export default {
    name: 'header'
  }
</script>
