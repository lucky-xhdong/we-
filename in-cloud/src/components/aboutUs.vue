<template>
  <section class="about-us-wrapper">
    <common-header></common-header>
    <!--first-section start-->
    <section class="common-section first-section">
      <section class="about-us-container">
        <!--map start-->
        <section class="map-wrapper">
        </section>
        <section class="contact-wrapper">
          <p class="txt-tel">Tel&emsp;+86 8765 4321</p>
          <p class="txt-address">Add&emsp;北京市朝阳区三元桥凤凰汇4楼b座2230室</p>
          <a href="javascript:;" class="btn-view">查看地图</a>
        </section>
        <!--map end-->
      </section>
    </section>
    <!--first-section end-->
    <common-footer></common-footer>
  </section>
</template>

<script>
  import commonHeader from '@/components/common/header'
  import commonFooter from '@/components/common/footer'

  export default {
    name: 'aboutUs',
    data() {
      return {}
    },
    components: {
      commonHeader, commonFooter
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
  @import '@/styles/aboutUs.scss'
</style>
