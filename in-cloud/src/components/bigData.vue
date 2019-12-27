<template>
  <section class="bigdata-wrapper">
    <common-header></common-header>
    <!--first-section start-->
    <section class="common-section first-section">
      <section class="bigdata-container">
        <!--service start-->
        <section class="service-wrapper">
          <div class="corp-info" data-before="成熟领先的大数据解决方案">
            <p class="txt">公司是集大数据处理和优化为一体的高科技企业，致力于为企业提供完整的大数据解决方案。我们的目标是简化复杂难用的hadoop，推动hadoop在企业市场的应用。我们的做法是简化数据采集和分析流程，将hadoop中的原始数据自动转化成可以互动的商业智能服务，无需ETL或者数据仓库。</p>
          </div>
        </section>
        <!--service end-->
      </section>
    </section>
    <!--first-section end-->

    <!--second-section start-->
    <section class="common-section second-section">
      <section class="bigdata-container">
        <div class="bigdata-list-wrapper">
          <ul>
            <li>
              <div class="img-wrapper">
                <img src="../assets/images/img-mobile-01.png" alt="" class="img">
              </div>
              <div class="txt-wrapper">
                <p class="txt-title">这里是大标题GUIDE</p>
                <p class="txt-summary">这里是文字简介</p>
              </div>
            </li>
            <li>
              <div class="img-wrapper">
                <img src="../assets/images/img-mobile-01.png" alt="" class="img">
              </div>
              <div class="txt-wrapper">
                <p class="txt-title">这里是大标题GUIDE</p>
                <p class="txt-summary">这里是文字简介</p>
              </div>
            </li>
            <li>
              <div class="img-wrapper">
                <img src="../assets/images/img-mobile-01.png" alt="" class="img">
              </div>
              <div class="txt-wrapper">
                <p class="txt-title">这里是大标题GUIDE</p>
                <p class="txt-summary">这里是文字简介</p>
              </div>
            </li>
            <li>
              <div class="img-wrapper">
                <img src="../assets/images/img-mobile-01.png" alt="" class="img">
              </div>
              <div class="txt-wrapper">
                <p class="txt-title">这里是大标题GUIDE</p>
                <p class="txt-summary">这里是文字简介</p>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </section>
    <!--second-section end-->
    <common-footer></common-footer>
  </section>
</template>

<script>
  import commonHeader from '@/components/common/header'
  import commonFooter from '@/components/common/footer'

  export default {
    name: 'bigData',
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
  @import '@/styles/bigdata.scss'
</style>
