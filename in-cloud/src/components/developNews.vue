<template>
  <section class="develop-news-wrapper">
    <common-header></common-header>
    <!--first-section start-->
    <section class="common-section first-section">
      <section class="develop-news-container">
        <!--service start-->
        <section class="service-wrapper">
          <div class="corp-info" data-before="新鲜、全面、专业的开发资讯">
            <p class="txt">“为企业客户展示涵盖iOS、Android、区块链、云计算等领域的开发信息，APP开发公司动态以及APP开发问题解答</p>
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
          <section class="develop-news-container">
            <ul>
              <li class="active"><a href="javascript:;" class="txt">APP</a></li>
              <li><a href="javascript:;" class="txt">公众号</a></li>
              <li><a href="javascript:;" class="txt">小程序</a></li>
            </ul>
          </section>
        </div>
        <div class="tabs-content">
          <section class="develop-news-container">
            <div class="tabs-app">
              <ul>
                <li>
                  <div class="img-wrapper">
                    <img src="../assets/images/img-mobile-01.png" alt="" class="img">
                  </div>
                  <div class="txt-wrapper">
                    <p class="txt-title">这里是大标题GUIDE</p>
                    <p class="txt-summary">这里是文字简介</p>
                    <p class="txt-subinfo">
                      <span class="txt-label">标签：ios开发，安卓开发</span>
                      <span class="txt-time">2019-07-14</span>
                    </p>
                  </div>
                </li>
                <li>
                  <div class="img-wrapper">
                    <img src="../assets/images/img-mobile-01.png" alt="" class="img">
                  </div>
                  <div class="txt-wrapper">
                    <p class="txt-title">这里是大标题GUIDE</p>
                    <p class="txt-summary">这里是文字简介</p>
                    <p class="txt-subinfo">
                      <span class="txt-label">标签：ios开发，安卓开发</span>
                      <span class="txt-time">2019-07-14</span>
                    </p>
                  </div>
                </li>
                <li>
                  <div class="img-wrapper">
                    <img src="../assets/images/img-mobile-01.png" alt="" class="img">
                  </div>
                  <div class="txt-wrapper">
                    <p class="txt-title">这里是大标题GUIDE</p>
                    <p class="txt-summary">这里是文字简介</p>
                    <p class="txt-subinfo">
                      <span class="txt-label">标签：ios开发，安卓开发</span>
                      <span class="txt-time">2019-07-14</span>
                    </p>
                  </div>
                </li>
              </ul></div>
            <div class="tabs-subscription"></div>
            <div class="tabs-program">
            </div>
          </section>
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
    name: 'developNews',
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
  @import '@/styles/developnews.scss'
</style>
