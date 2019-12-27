<template>
  <section class="mobile-wrapper">
    <common-header></common-header>
    <!--first-section start-->
    <section class="common-section first-section">
      <section class="mobile-container">
        <!--service start-->
        <section class="service-wrapper">
          <div class="corp-info" data-before="我们为多个产品提供了开发解决方案">
            <p class="txt">“创意+设计+技术”并重的整合解决方案</p>
            <p class="txt">“高效和完善的执行力</p>
            <p class="txt">是我们为您提供最佳整合的质量保证</p>
          </div>
        </section>
        <!--service end-->
      </section>
    </section>
    <!--first-section end-->

    <!--second-section start-->
    <section class="common-section second-section">
      <div class="tabs-wrapper">
        <div class="tabs-header">
          <div class="mobile-container">
            <ul>
              <li class="active"><a href="javascript:;" class="txt">APP</a></li>
              <li><a href="javascript:;" class="txt">公众号</a></li>
              <li><a href="javascript:;" class="txt">小程序</a></li>
            </ul>
          </div>
        </div>
        <div class="tabs-content">
          <div class="mobile-container">
            <div class="tabs-app"></div>
            <div class="tabs-subscription"></div>
            <div class="tabs-program">
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
          </div>
        </div>
      </div>
    </section>
    <!--second-section end-->
    <common-footer></common-footer>
  </section>
</template>

<script>
  import commonHeader from '@/components/common/header'
  import commonFooter from '@/components/common/footer'

  export default {
    name: 'mobile',
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
  @import '@/styles/mobile.scss'
</style>
