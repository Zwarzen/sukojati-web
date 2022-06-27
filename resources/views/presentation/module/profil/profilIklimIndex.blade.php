@extends('presentation.layouts.mainArtikelContent')

@section('pageContentArtikel')
    <article class="article-justify container">
        <header>
            <div style="height: 5vh"></div>
            <h1 class="">Iklim</h1> 
        </header>
        

        <h2>Iklim dan Curah Hujan <span style="color: #0DCEDA;">Banyuwangi</span> </h2>

        <div class="toggle toggle-transparent toggle-bordered-simple">
            <div class="toggle active">
                <label>Jumlah Curah Hujan (mm) dan Jumlah Hari Hujan</label>
                <div class="toggle-content">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center" rowspan="2" style="padding: 20px 0px;">Bulan</td>
                                    <td align="center" colspan="9">Jumlah Curah Hujan (mm)</td>
                                </tr>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
        <!--                             <td align="center">2011</td>
                                    <td align="center">2012</td>
                                    <td align="center">2013</td>
                                    <td align="center">2014</td>
                                    <td align="center">2015</td> -->
                                    <td align="center">2016</td>
                                    <td align="center">2017</td>
                                    <td align="center">2018</td>
                                    <td align="center">2019</td>
                                    <td align="center">2020</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="left">Januari</td>
        <!--                             <td align="center">181.6</td>
                                    <td align="center">340.1</td>
                                    <td align="center">527.5</td>
                                    <td align="center">216.6</td>
                                    <td align="center">150.1</td> -->
                                    <td align="center">116.1</td>
                                    <td align="center">244.0</td>
                                    <td align="center">474.3</td>
                                    <td align="center">236.4</td>
                                    <td align="center">136.3</td>
                                </tr>
                                <tr>
                                    <td align="left">Februari</td>
        <!--                             <td align="center">103.3</td>
                                    <td align="center">134.1</td>
                                    <td align="center">100.2</td>
                                    <td align="center">227.3</td>
                                    <td align="center">202.7</td> -->
                                    <td align="center">238.5</td>
                                    <td align="center">224.8</td>
                                    <td align="center">276.0</td>
                                    <td align="center">81.9</td>
                                    <td align="center">257.0</td>
                                </tr>
                                <tr>
                                    <td align="left">Maret</td>
        <!--                             <td align="center">139.6</td>
                                    <td align="center">94.7</td>
                                    <td align="center">193.1</td>
                                    <td align="center">28.3</td>
                                    <td align="center">225.9</td> -->
                                    <td align="center">66.9</td>
                                    <td align="center">121.1</td>
                                    <td align="center">161.9</td>
                                    <td align="center">210.8</td>
                                    <td align="center">217.1</td>
                                </tr>
                                <tr>
                                    <td align="left">April</td>
        <!--                             <td align="center">144.3</td>
                                    <td align="center">53.3</td>
                                    <td align="center">228.8</td>
                                    <td align="center">127.0</td>
                                    <td align="center">84.3</td> -->
                                    <td align="center">48.7</td>
                                    <td align="center">83.7</td>
                                    <td align="center">28.9</td>
                                    <td align="center">239.5</td>
                                    <td align="center">40.7</td>
                                </tr>
                                <tr>
                                    <td align="left">Mei</td>
        <!--                             <td align="center">107.1</td>
                                    <td align="center">87.1</td>
                                    <td align="center">97.3</td>
                                    <td align="center">19.4</td>
                                    <td align="center">87.1</td> -->
                                    <td align="center">100.0</td>
                                    <td align="center">150.9</td>
                                    <td align="center">5.9</td>
                                    <td align="center">26.1</td>
                                    <td align="center">232.4</td>
                                </tr>
                                <tr>
                                    <td align="left">Juni</td>
        <!--                             <td align="center">24.8</td>
                                    <td align="center">15.3</td>
                                    <td align="center">122.8</td>
                                    <td align="center">16.9</td>
                                    <td align="center">58.8</td> -->
                                    <td align="center">172.7</td>
                                    <td align="center">173.2</td>
                                    <td align="center">33.1</td>
                                    <td align="center">15.5</td>
                                    <td align="center">77.9</td>
                                </tr>
                                <tr>
                                    <td align="left">Juli</td>
        <!--                             <td align="center">41.8</td>
                                    <td align="center">35.8</td>
                                    <td align="center">156.0</td>
                                    <td align="center">136.1</td>
                                    <td align="center">TTU</td> -->
                                    <td align="center">81.9</td>
                                    <td align="center">118.4</td>
                                    <td align="center">68.5</td>
                                    <td align="center">0</td>
                                    <td align="center">82</td>
                                </tr>
                                <tr>
                                    <td align="left">Agustus</td>
        <!--                             <td align="center">8.0</td>
                                    <td align="center">10.7</td>
                                    <td align="center">37.3</td>
                                    <td align="center">24.3</td>
                                    <td align="center">14.9</td> -->
                                    <td align="center">145.1</td>
                                    <td align="center">48.2</td>
                                    <td align="center">69.4</td>
                                    <td align="center">6.80</td>
                                    <td align="center">48.0</td>
                                </tr>
                                <tr>
                                    <td align="left">September</td>
        <!--                             <td align="center">4.0</td>
                                    <td align="center">11.5</td>
                                    <td align="center">6.9</td>
                                    <td align="center">TTU</td>
                                    <td align="center">0.8</td> -->
                                    <td align="center">22.8</td>
                                    <td align="center">9.3</td>
                                    <td align="center">9.0</td>
                                    <td align="center">29.7</td>
                                    <td align="center">93.9</td>
                                </tr>
                                <tr>
                                    <td align="left">Oktober</td>
        <!--                             <td align="center">40.8</td>
                                    <td align="center">6.3</td>
                                    <td align="center">0.8</td>
                                    <td align="center">36.5</td>
                                    <td align="center">TTU</td> -->
                                    <td align="center">76.7</td>
                                    <td align="center">113.2</td>
                                    <td align="center">0.7</td>
                                    <td align="center">0</td>
                                    <td align="center">242</td>
                                </tr>
                                <tr>
                                    <td align="left">November</td>
        <!--                             <td align="center">104.3</td>
                                    <td align="center">79.6</td>
                                    <td align="center">237.6</td>
                                    <td align="center">91.5</td>
                                    <td align="center">TTU</td> -->
                                    <td align="center">121.7</td>
                                    <td align="center">192.5</td>
                                    <td align="center">239.2</td>
                                    <td align="center">2.8</td>
                                    <td align="center">28.6</td>
                                </tr>
                                <tr>
                                    <td align="left">Desember</td>
        <!--                             <td align="center">195.5</td>
                                    <td align="center">156.4</td>
                                    <td align="center">160.3</td>
                                    <td align="center">172.8</td>
                                    <td align="center">148.2</td> -->
                                    <td align="center">255.7</td>
                                    <td align="center">276.6</td>
                                    <td align="center">97.6</td>
                                    <td align="center">11.8</td>
                                    <td align="center">148.9</td>
                                </tr>
                            </tbody>
                        </table>
                        <p align="right">Sumber : Badan Meteorologi, Klimatologi dan Geofisika Banyuwangi</p>
                    </div>
                    <div class="table-responsive" style="margin-top: 20px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center" rowspan="2" style="padding: 20px 0px;">Bulan</td>
                                    <td align="center" colspan="9">Jumlah Curah Hujan (hari)</td>
                                </tr>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
        <!--                             <td align="center">2011</td>
                                    <td align="center">2012</td>
                                    <td align="center">2013</td>
                                    <td align="center">2014</td>
                                    <td align="center">2015</td> -->
                                    <td align="center">2016</td>
                                    <td align="center">2017</td>
                                    <td align="center">2018</td>
                                    <td align="center">2019</td>
                                    <td align="center">2020</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="left">Januari</td>
        <!--                             <td align="center">27</td>
                                    <td align="center">21</td>
                                    <td align="center">25</td>
                                    <td align="center">21</td>
                                    <td align="center">15</td> -->
                                    <td align="center">10</td>
                                    <td align="center">27</td>
                                    <td align="center">23</td>
                                    <td align="center">26</td>
                                    <td align="center">17</td>
                                </tr>
                                <tr>
                                    <td align="left">Februari</td>
        <!--                             <td align="center">17</td>
                                    <td align="center">18</td>
                                    <td align="center">14</td>
                                    <td align="center">21</td>
                                    <td align="center">13</td> -->
                                    <td align="center">15</td>
                                    <td align="center">11</td>
                                    <td align="center">20</td>
                                    <td align="center">17</td>
                                    <td align="center">22</td>
                                </tr>
                                <tr>
                                    <td align="left">Maret</td>
        <!--                             <td align="center">17</td>
                                    <td align="center">19</td>
                                    <td align="center">19</td>
                                    <td align="center">12</td>
                                    <td align="center">12</td> -->
                                    <td align="center">6</td>
                                    <td align="center">15</td>
                                    <td align="center">12</td>
                                    <td align="center">20</td>
                                    <td align="center">17</td>
                                </tr>
                                <tr>
                                    <td align="left">April</td>
        <!--                             <td align="center">18</td>
                                    <td align="center">7</td>
                                    <td align="center">16</td>
                                    <td align="center">16</td>
                                    <td align="center">9</td> -->
                                    <td align="center">5</td>
                                    <td align="center">17</td>
                                    <td align="center">9</td>
                                    <td align="center">20</td>
                                    <td align="center">14</td>
                                </tr>
                                <tr>
                                    <td align="left">Mei</td>
        <!--                             <td align="center">17</td>
                                    <td align="center">14</td>
                                    <td align="center">16</td>
                                    <td align="center">10</td>
                                    <td align="center">5</td> -->
                                    <td align="center">7</td>
                                    <td align="center">12</td>
                                    <td align="center">5</td>
                                    <td align="center">14</td>
                                    <td align="center">17</td>
                                </tr>
                                <tr>
                                    <td align="left">Juni</td>
        <!--                             <td align="center">12</td>
                                    <td align="center">6</td>
                                    <td align="center">18</td>
                                    <td align="center">9</td>
                                    <td align="center">5</td> -->
                                    <td align="center">9</td>
                                    <td align="center">13</td>
                                    <td align="center">10</td>
                                    <td align="center">4</td>
                                    <td align="center">14</td>
                                </tr>
                                <tr>
                                    <td align="left">Juli</td>
        <!--                             <td align="center">12</td>
                                    <td align="center">7</td>
                                    <td align="center">18</td>
                                    <td align="center">12</td>
                                    <td align="center">0</td> -->
                                    <td align="center">6</td>
                                    <td align="center">16</td>
                                    <td align="center">9</td>
                                    <td align="center">-</td>
                                    <td align="center">10</td>
                                </tr>
                                <tr>
                                    <td align="left">Agustus</td>
        <!--                             <td align="center">3</td>
                                    <td align="center">6</td>
                                    <td align="center">6</td>
                                    <td align="center">6</td>
                                    <td align="center">5</td> -->
                                    <td align="center">10</td>
                                    <td align="center">7</td>
                                    <td align="center">17</td>
                                    <td align="center">3</td>
                                    <td align="center">16</td>
                                </tr>
                                <tr>
                                    <td align="left">September</td>
        <!--                             <td align="center">1</td>
                                    <td align="center">4</td>
                                    <td align="center">4</td>
                                    <td align="center">1</td>
                                    <td align="center">0</td> -->
                                    <td align="center">5</td>
                                    <td align="center">7</td>
                                    <td align="center">4</td>
                                    <td align="center">4</td>
                                    <td align="center">12</td>
                                </tr>
                                <tr>
                                    <td align="left">Oktober</td>
        <!--                             <td align="center">7</td>
                                    <td align="center">3</td>
                                    <td align="center">4</td>
                                    <td align="center">2</td>
                                    <td align="center">0</td> -->
                                    <td align="center">8</td>
                                    <td align="center">8</td>
                                    <td align="center">5</td>
                                    <td align="center">-</td>
                                    <td align="center">19</td>
                                </tr>
                                <tr>
                                    <td align="left">November</td>
        <!--                             <td align="center">14</td>
                                    <td align="center">8</td>
                                    <td align="center">21</td>
                                    <td align="center">9</td>
                                    <td align="center">0</td> -->
                                    <td align="center">9</td>
                                    <td align="center">19</td>
                                    <td align="center">13</td>
                                    <td align="center">3</td>
                                    <td align="center">11</td>
                                </tr>
                                <tr>
                                    <td align="left">Desember</td>
        <!--                             <td align="center">20</td>
                                    <td align="center">22</td>
                                    <td align="center">21</td>
                                    <td align="center">20</td>
                                    <td align="center">15</td> -->
                                    <td align="center">21</td>
                                    <td align="center">25</td>
                                    <td align="center">18</td>
                                    <td align="center">9</td>
                                    <td align="center">23</td>
                                </tr>
                            </tbody>
                        </table>
                        <p align="right">Sumber : Badan Meteorologi, Klimatologi dan Geofisika Banyuwangi</p>
                    </div>
                </div>
            </div>
        
            <div class="toggle">
                <label>Kelembaban Udara</label>
                <div class="toggle-content">
        
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center" rowspan="2" style="padding: 20px 0px;">Bulan</td>
                                    <td align="center" colspan="9">Kelembaban (%)</td>
                                </tr>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
        <!--                             <td align="center">2011</td>
                                    <td align="center">2012</td>
                                    <td align="center">2013</td>
                                    <td align="center">2014</td>
                                    <td align="center">2015</td> -->
                                    <td align="center">2016</td>
                                    <td align="center">2017</td>
                                    <td align="center">2018</td>
                                    <td align="center">2019</td>
                                    <td align="center">2020</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="left">Januari</td>
        <!--                             <td align="center">85</td>
                                    <td align="center">87</td>
                                    <td align="center">86</td>
                                    <td align="center">80</td>
                                    <td align="center">87</td> -->
                                    <td align="center">76</td>
                                    <td align="center">81</td>
                                    <td align="center">83</td>
                                    <td align="center">80</td>
                                    <td align="center">74</td>
                                </tr>
                                <tr>
                                    <td align="left">Februari</td>
        <!--                             <td align="center">84</td>
                                    <td align="center">84</td>
                                    <td align="center">81</td>
                                    <td align="center">82</td>
                                    <td align="center">88</td> -->
                                    <td align="center">84</td>
                                    <td align="center">76</td>
                                    <td align="center">79</td>
                                    <td align="center">76</td>
                                    <td align="center">80</td>
                                </tr>
                                <tr>
                                    <td align="left">Maret</td>
        <!--                             <td align="center">84</td>
                                    <td align="center">81</td>
                                    <td align="center">82</td>
                                    <td align="center">76</td>
                                    <td align="center">80</td> -->
                                    <td align="center">76</td>
                                    <td align="center">77</td>
                                    <td align="center">73</td>
                                    <td align="center">79</td>
                                    <td align="center">79</td>
                                </tr>
                                <tr>
                                    <td align="left">April</td>
        <!--                             <td align="center">85</td>
                                    <td align="center">79</td>
                                    <td align="center">83</td>
                                    <td align="center">78</td>
                                    <td align="center">83</td> -->
                                    <td align="center">76</td>
                                    <td align="center">75</td>
                                    <td align="center">71</td>
                                    <td align="center">78</td>
                                    <td align="center">77</td>
                                </tr>
                                <tr>
                                    <td align="left">Mei</td>
        <!--                             <td align="center">84</td>
                                    <td align="center">83</td>
                                    <td align="center">84</td>
                                    <td align="center">72</td>
                                    <td align="center">79</td> -->
                                    <td align="center">78</td>
                                    <td align="center">77</td>
                                    <td align="center">75</td>
                                    <td align="center">77</td>
                                    <td align="center">81</td>
                                </tr>
                                <tr>
                                    <td align="left">Juni</td>
        <!--                             <td align="center">82</td>
                                    <td align="center">82</td>
                                    <td align="center">86</td>
                                    <td align="center">75</td>
                                    <td align="center">81</td> -->
                                    <td align="center">76</td>
                                    <td align="center">83</td>
                                    <td align="center">78</td>
                                    <td align="center">78</td>
                                    <td align="center">80</td>
                                </tr>
                                <tr>
                                    <td align="left">Juli</td>
        <!--                             <td align="center">82</td>
                                    <td align="center">83</td>
                                    <td align="center">82</td>
                                    <td align="center">80</td>
                                    <td align="center">80</td> -->
                                    <td align="center">78</td>
                                    <td align="center">82</td>
                                    <td align="center">76</td>
                                    <td align="center">78</td>
                                    <td align="center">79</td>
                                </tr>
                                <tr>
                                    <td align="left">Agustus</td>
        <!--                             <td align="center">80</td>
                                    <td align="center">77</td>
                                    <td align="center">78</td>
                                    <td align="center">78</td>
                                    <td align="center">80</td> -->
                                    <td align="center">76</td>
                                    <td align="center">80</td>
                                    <td align="center">78</td>
                                    <td align="center">76</td>
                                    <td align="center">80</td>
                                </tr>
                                <tr>
                                    <td align="left">September</td>
        <!--                             <td align="center">80</td>
                                    <td align="center">78</td>
                                    <td align="center">77</td>
                                    <td align="center">75</td>
                                    <td align="center">78</td> -->
                                    <td align="center">74</td>
                                    <td align="center">79</td>
                                    <td align="center">72</td>
                                    <td align="center">77</td>
                                    <td align="center">78</td>
                                </tr>
                                <tr>
                                    <td align="left">Oktober</td>
        <!--                             <td align="center">80</td>
                                    <td align="center">78</td>
                                    <td align="center">75</td>
                                    <td align="center">73</td>
                                    <td align="center">77</td> -->
                                    <td align="center">73</td>
                                    <td align="center">78</td>
                                    <td align="center">69</td>
                                    <td align="center">72</td>
                                    <td align="center">81</td>
                                </tr>
                                <tr>
                                    <td align="left">November</td>
        <!--                             <td align="center">82</td>
                                    <td align="center">78</td>
                                    <td align="center">82</td>
                                    <td align="center">73</td>
                                    <td align="center">72</td> -->
                                    <td align="center">80</td>
                                    <td align="center">80</td>
                                    <td align="center">74</td>
                                    <td align="center">72</td>
                                    <td align="center">77</td>
                                </tr>
                                <tr>
                                    <td align="left">Desember</td>
        <!--                             <td align="center">78</td>
                                    <td align="center">83</td>
                                    <td align="center">83</td>
                                    <td align="center">79</td>
                                    <td align="center">77</td> -->
                                    <td align="center">79</td>
                                    <td align="center">81</td>
                                    <td align="center">74</td>
                                    <td align="center">71</td>
                                    <td align="center">81</td>
                                </tr>
                            </tbody>
                        </table>
                        <p align="right">Sumber : Badan Meteorologi, Klimatologi dan Geofisika Banyuwangi</p>
                    </div>
        
                </div>
            </div>
        
            <div class="toggle">
                <label>Suhu Maksimum, Minimum dan Rata-rata Suhu</label>
                <div class="toggle-content">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center" rowspan="2" style="padding: 20px 0px;">Bulan</td>
                                    <td align="center" colspan="9">Rata-rata suhu bulanan (°C)</td>
                                </tr>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
        <!--                             <td align="center">2011</td>
                                    <td align="center">2012</td>
                                    <td align="center">2013</td>
                                    <td align="center">2014</td>
                                    <td align="center">2015</td> -->
                                    <td align="center">2016</td>
                                    <td align="center">2017</td>
                                    <td align="center">2018</td>
                                    <td align="center">2019</td>
                                    <td align="center">2020</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="left">Januari</td>
        <!--                             <td align="center">26.9</td>
                                    <td align="center">26</td>
                                    <td align="center">26.7</td>
                                    <td align="center">27.4</td>
                                    <td align="center">27.6</td> -->
                                    <td align="center">28.7</td>
                                    <td align="center">27.4</td>
                                    <td align="center">27.6</td>
                                    <td align="center">28.0</td>
                                    <td align="center">28.5</td>
                                </tr>
                                <tr>
                                    <td align="left">Februari</td>
        <!--                             <td align="center">27.4</td>
                                    <td align="center">27.1</td>
                                    <td align="center">27.7</td>
                                    <td align="center">27.0</td>
                                    <td align="center">27.6</td> -->
                                    <td align="center">27.4</td>
                                    <td align="center">28.1</td>
                                    <td align="center">27.6</td>
                                    <td align="center">28.4</td>
                                    <td align="center">28.0</td>
                                </tr>
                                <tr>
                                    <td align="left">Maret</td>
        <!--                             <td align="center">27.0</td>
                                    <td align="center">27.5</td>
                                    <td align="center">27.4</td>
                                    <td align="center">28.0</td>
                                    <td align="center">27.5</td> -->
                                    <td align="center">28.0</td>
                                    <td align="center">28.0</td>
                                    <td align="center">28.5</td>
                                    <td align="center">28.0</td>
                                    <td align="center">28.2</td>
                                </tr>
                                <tr>
                                    <td align="left">April</td>
        <!--                             <td align="center">27.3</td>
                                    <td align="center">28.2</td>
                                    <td align="center">24.8</td>
                                    <td align="center">28.0</td>
                                    <td align="center">27.4</td> -->
                                    <td align="center">29.0</td>
                                    <td align="center">28.6</td>
                                    <td align="center">29.5</td>
                                    <td align="center">28.6</td>
                                    <td align="center">28.7</td>
                                </tr>
                                <tr>
                                    <td align="left">Mei</td>
        <!--                             <td align="center">27.3</td>
                                    <td align="center">27.0</td>
                                    <td align="center">27.5</td>
                                    <td align="center">28.5</td>
                                    <td align="center">27.2</td> -->
                                    <td align="center">28.8</td>
                                    <td align="center">28.2</td>
                                    <td align="center">28.1</td>
                                    <td align="center">28.1</td>
                                    <td align="center">28.0</td>
                                </tr>
                                <tr>
                                    <td align="left">Juni</td>
        <!--                             <td align="center">26.1</td>
                                    <td align="center">26.1</td>
                                    <td align="center">27.0</td>
                                    <td align="center">27.4</td>
                                    <td align="center">26.5</td> -->
                                    <td align="center">28.2</td>
                                    <td align="center">26.9</td>
                                    <td align="center">27.0</td>
                                    <td align="center">26.5</td>
                                    <td align="center">27.0</td>
                                </tr>
                                <tr>
                                    <td align="left">Juli</td>
        <!--                             <td align="center">25.8</td>
                                    <td align="center">25.5</td>
                                    <td align="center">26.1</td>
                                    <td align="center">26.2</td>
                                    <td align="center">25.6</td> -->
                                    <td align="center">27.5</td>
                                    <td align="center">26.1</td>
                                    <td align="center">26.2</td>
                                    <td align="center">25.7</td>
                                    <td align="center">26.3</td>
                                </tr>
                                <tr>
                                    <td align="left">Agustus</td>
        <!--                             <td align="center">25.7</td>
                                    <td align="center">25.5</td>
                                    <td align="center">26.0</td>
                                    <td align="center">26.3</td>
                                    <td align="center">25.6</td> -->
                                    <td align="center">27.2</td>
                                    <td align="center">26.1</td>
                                    <td align="center">25.7</td>
                                    <td align="center">25.8</td>
                                    <td align="center">26.3</td>
                                </tr>
                                <tr>
                                    <td align="left">September</td>
        <!--                             <td align="center">26.3</td>
                                    <td align="center">26.3</td>
                                    <td align="center">26.3</td>
                                    <td align="center">26.2</td>
                                    <td align="center">26.3</td> -->
                                    <td align="center">28.5</td>
                                    <td align="center">27.1</td>
                                    <td align="center">27.1</td>
                                    <td align="center">26.2</td>
                                    <td align="center">26.3</td>
                                </tr>
                                <tr>
                                    <td align="left">Oktober</td>
        <!--                             <td align="center">26.4</td>
                                    <td align="center">27.8</td>
                                    <td align="center">28.2</td>
                                    <td align="center">27.8</td>
                                    <td align="center">27.6</td> -->
                                    <td align="center">29.0</td>
                                    <td align="center">28.3</td>
                                    <td align="center">28.8</td>
                                    <td align="center">27.7</td>
                                    <td align="center">27.2</td>
                                </tr>
                                <tr>
                                    <td align="left">November</td>
        <!--                             <td align="center">27.7</td>
                                    <td align="center">27.5</td>
                                    <td align="center">27.4</td>
                                    <td align="center">29.2</td>
                                    <td align="center">29.6</td> -->
                                    <td align="center">29.1</td>
                                    <td align="center">27.9</td>
                                    <td align="center">29.2</td>
                                    <td align="center">28.7</td>
                                    <td align="center">28.2</td>
                                </tr>
                                <tr>
                                    <td align="left">Desember</td>
        <!--                             <td align="center">28.2</td>
                                    <td align="center">27.5</td>
                                    <td align="center">27.2</td>
                                    <td align="center">27.9</td>
                                    <td align="center">28.7</td> -->
                                    <td align="center">27.9</td>
                                    <td align="center">27.7</td>
                                    <td align="center">29.2</td>
                                    <td align="center">29.6</td>
                                    <td align="center">27.2</td>
                                </tr>
                            </tbody>
                        </table>
                        <p align="right">Sumber : Badan Meteorologi, Klimatologi dan Geofisika Banyuwangi</p>
                    </div>
        
        
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center" rowspan="2" style="padding: 20px 0px;">Bulan</td>
                                    <td align="center" colspan="9">Suhu Maksimum Kabupaten Banyuwangi (°C)</td>
                                </tr>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center">2016</td>
                                    <td align="center">2017</td>
                                    <td align="center">2018</td>
                                    <td align="center">2019</td>
                                    <td align="center">2020</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="left">Januari</td>
                                    <td align="center">35.2</td>
                                    <td align="center">32.6</td>
                                    <td align="center">34.8</td>
                                    <td align="center">34.8</td>
                                    <td align="center">34.9</td>
                                </tr>
                                <tr>
                                    <td align="left">Februari</td>
                                    <td align="center">33.5</td>
                                    <td align="center">33</td>
                                    <td align="center">34</td>
                                    <td align="center">34.6</td>
                                    <td align="center">34.2</td>
                                </tr>
                                <tr>
                                    <td align="left">Maret</td>
                                    <td align="center">34.4</td>
                                    <td align="center">33.6</td>
                                    <td align="center">34.1</td>
                                    <td align="center">34.8</td>
                                    <td align="center">33.9</td>
                                </tr>
                                <tr>
                                    <td align="left">April</td>
                                    <td align="center">31</td>
                                    <td align="center">33.8</td>
                                    <td align="center">34</td>
                                    <td align="center">32.7</td>
                                    <td align="center">34</td>
                                </tr>
                                <tr>
                                    <td align="left">Mei</td>
                                    <td align="center">33.8</td>
                                    <td align="center">32.5</td>
                                    <td align="center">32.8</td>
                                    <td align="center">32.7</td>
                                    <td align="center">33.4</td>
                                </tr>
                                <tr>
                                    <td align="left">Juni</td>
                                    <td align="center">34.2</td>
                                    <td align="center">31.2</td>
                                    <td align="center">32.2</td>
                                    <td align="center">32.3</td>
                                    <td align="center">32.2</td>
                                </tr>
                                <tr>
                                    <td align="left">Juli</td>
                                    <td align="center">32.2</td>
                                    <td align="center">31</td>
                                    <td align="center">30.6</td>
                                    <td align="center">30.4</td>
                                    <td align="center">30</td>
                                </tr>
                                <tr>
                                    <td align="left">Agustus</td>
                                    <td align="center">32.2</td>
                                    <td align="center">32</td>
                                    <td align="center">30.6</td>
                                    <td align="center">30.7</td>
                                    <td align="center">32.2</td>
                                </tr>
                                <tr>
                                    <td align="left">September</td>
                                    <td align="center">33.8</td>
                                    <td align="center">32</td>
                                    <td align="center">32.7</td>
                                    <td align="center">30.8</td>
                                    <td align="center">32.4</td>
                                </tr>
                                <tr>
                                    <td align="left">Oktober</td>
                                    <td align="center">34</td>
                                    <td align="center">32.8</td>
                                    <td align="center">33.6</td>
                                    <td align="center">33.1</td>
                                    <td align="center">32</td>
                                </tr>
                                <tr>
                                    <td align="left">November</td>
                                    <td align="center">34.6</td>
                                    <td align="center">33.8</td>
                                    <td align="center">35</td>
                                    <td align="center">35</td>
                                    <td align="center">33.2</td>
                                </tr>
                                <tr>
                                    <td align="left">Desember</td>
                                    <td align="center">34</td>
                                    <td align="center">33</td>
                                    <td align="center">34.4</td>
                                    <td align="center">36</td>
                                    <td align="center">33.7</td>
                                </tr>
                            </tbody>
                        </table>
                        <p align="right">Sumber : Badan Meteorologi, Klimatologi dan Geofisika Banyuwangi</p>
                    </div>
        
        
        
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center" rowspan="2" style="padding: 20px 0px;">Bulan</td>
                                    <td align="center" colspan="9">Suhu Minimum Kabupaten Banyuwangi (°C)</td>
                                </tr>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
        <!--                             <td align="center">2011</td>
                                    <td align="center">2012</td>
                                    <td align="center">2013</td>
                                    <td align="center">2014</td>
                                    <td align="center">2015</td> -->
                                    <td align="center">2016</td>
                                    <td align="center">2017</td>
                                    <td align="center">2018</td>
                                    <td align="center">2019</td>
                                    <td align="center">2020</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="left">Januari</td>
        <!--                             <td align="center">22.8</td>
                                    <td align="center">23</td>
                                    <td align="center">23.2</td>
                                    <td align="center">23.5</td>
                                    <td align="center">22.7</td> -->
                                    <td align="center">24</td>
                                    <td align="center">23.2</td>
                                    <td align="center">23.2</td>
                                    <td align="center">23.4</td>
                                    <td align="center">23.2</td>
                                </tr>
                                <tr>
                                    <td align="left">Februari</td>
                                    <td align="center">23.8</td>
                                    <td align="center">23.2</td>
                                    <td align="center">22.6</td>
                                    <td align="center">21.3</td>
                                    <td align="center">23.2</td>
                                </tr>
                                <tr>
                                    <td align="left">Maret</td>
                                    <td align="center">24.4</td>
                                    <td align="center">23.4</td>
                                    <td align="center">24.1</td>
                                    <td align="center">22.6</td>
                                    <td align="center">23.0</td>
                                </tr>
                                <tr>
                                    <td align="left">April</td>
                                    <td align="center">24.4</td>
                                    <td align="center">22.5</td>
                                    <td align="center">23.4</td>
                                    <td align="center">23.6</td>
                                    <td align="center">24.0</td>
                                </tr>
                                <tr>
                                    <td align="left">Mei</td>
                                    <td align="center">23.8</td>
                                    <td align="center">23.4</td>
                                    <td align="center">22.6</td>
                                    <td align="center">23.2</td>
                                    <td align="center">23.8</td>
                                </tr>
                                <tr>
                                    <td align="left">Juni</td>
                                    <td align="center">23.4</td>
                                    <td align="center">22.9</td>
                                    <td align="center">22.4</td>
                                    <td align="center">21</td>
                                    <td align="center">21.4</td>
                                </tr>
                                <tr>
                                    <td align="left">Juli</td>
                                    <td align="center">21</td>
                                    <td align="center">22.8</td>
                                    <td align="center">20.8</td>
                                    <td align="center">20.8</td>
                                    <td align="center">21.2</td>
                                </tr>
                                <tr>
                                    <td align="left">Agustus</td>
                                    <td align="center">21</td>
                                    <td align="center">21.8</td>
                                    <td align="center">21</td>
                                    <td align="center">21.5</td>
                                    <td align="center">22.2</td>
                                </tr>
                                <tr>
                                    <td align="left">September</td>
                                    <td align="center">23</td>
                                    <td align="center">19.2</td>
                                    <td align="center">21.7</td>
                                    <td align="center">21.4</td>
                                    <td align="center">22.0</td>
                                </tr>
                                <tr>
                                    <td align="left">Oktober</td>
                                    <td align="center">23.8</td>
                                    <td align="center">22.5</td>
                                    <td align="center">23</td>
                                    <td align="center">21.4</td>
                                    <td align="center">22.3</td>
                                </tr>
                                <tr>
                                    <td align="left">November</td>
                                    <td align="center">24</td>
                                    <td align="center">21</td>
                                    <td align="center">23</td>
                                    <td align="center">23.4</td>
                                    <td align="center">23.2</td>
                                </tr>
                                <tr>
                                    <td align="left">Desember</td>
                                    <td align="center">23</td>
                                    <td align="center">21.4</td>
                                    <td align="center">23.6</td>
                                    <td align="center">24</td>
                                    <td align="center">22.8</td>
                                </tr>
                            </tbody>
                        </table>
                        <p align="right">Sumber : Badan Meteorologi, Klimatologi dan Geofisika Banyuwangi</p>
                    </div>
                </div>
            </div>
        
            <div class="toggle">
                <label>Tekanan Udara dan Penyinaran Matahari</label>
                <div class="toggle-content">
        
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center" rowspan="2" style="padding: 20px 0px;">Bulan</td>
                                    <td align="center" colspan="9">Tekanan Udara (mb)</td>
                                </tr>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center">2016</td>
                                    <td align="center">2017</td>
                                    <td align="center">2018</td>
                                    <td align="center">2019</td>
                                    <td align="center">2020</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="left">Januari</td>
        <!--                             <td align="center">1007.1</td>
                                    <td align="center">1008.1</td>
                                    <td align="center">1008.7</td>
                                    <td align="center">1010.4</td>
                                    <td align="center">1009.9</td> -->
                                    <td align="center">1010.3</td>
                                    <td align="center">1008.6</td>
                                    <td align="center">1007.1</td>
                                    <td align="center">1009.4</td>
                                    <td align="center">1009.4</td>
                                </tr>
                                <tr>
                                    <td align="left">Februari</td>
        <!--                             <td align="center">1007.6</td>
                                    <td align="center">1009.1</td>
                                    <td align="center">1008.3</td>
                                    <td align="center">1009.7</td>
                                    <td align="center">1009.6</td> -->
                                    <td align="center">1009.9</td>
                                    <td align="center">1009.3</td>
                                    <td align="center">1009.6</td>
                                    <td align="center">1011.3</td>
                                    <td align="center">1009.9</td>
                                </tr>
                                <tr>
                                    <td align="left">Maret</td>
        <!--                             <td align="center">1007.9</td>
                                    <td align="center">1008.6</td>
                                    <td align="center">1010.2</td>
                                    <td align="center">1011.3</td>
                                    <td align="center">1010.3</td> -->
                                    <td align="center">1010.1</td>
                                    <td align="center">1009.7</td>
                                    <td align="center">1009.1</td>
                                    <td align="center">1010.0</td>
                                    <td align="center">1009.7</td>
                                </tr>
                                <tr>
                                    <td align="left">April</td>
        <!--                             <td align="center">1009.4</td>
                                    <td align="center">1011.3</td>
                                    <td align="center">1004.2</td>
                                    <td align="center">1010.8</td>
                                    <td align="center">1009.3</td> -->
                                    <td align="center">1009.8</td>
                                    <td align="center">1010.3</td>
                                    <td align="center">1010.0</td>
                                    <td align="center">1010.6</td>
                                </tr>
                                <tr>
                                    <td align="left">Mei</td>
        <!--                             <td align="center">1010.3</td>
                                    <td align="center">1011.3</td>
                                    <td align="center">1010.2</td>
                                    <td align="center">1011.5</td>
                                    <td align="center">1011.3</td> -->
                                    <td align="center">1009.5</td>
                                    <td align="center">1011.3</td>
                                    <td align="center">1011.2</td>
                                    <td align="center">1011.9</td>
                                    <td align="center">1010.4</td>
                                </tr>
                                <tr>
                                    <td align="left">Juni</td>
        <!--                             <td align="center">1011.7</td>
                                    <td align="center">1012.7</td>
                                    <td align="center">1009.2</td>
                                    <td align="center">1011.6</td>
                                    <td align="center">1011.8</td> -->
                                    <td align="center">1010.4</td>
                                    <td align="center">1012.1</td>
                                    <td align="center">1012.5</td>
                                    <td align="center">1012.3</td>
                                    <td align="center">1011.7</td>
                                </tr>
                                <tr>
                                    <td align="left">Juli</td>
        <!--                             <td align="center">1011.8</td>
                                    <td align="center">1013.1</td>
                                    <td align="center">1011.5</td>
                                    <td align="center">1013.5</td>
                                    <td align="center">1012.6</td> -->
                                    <td align="center">1010.3</td>
                                    <td align="center">1012.6</td>
                                    <td align="center">1012.6</td>
                                    <td align="center">1013.5</td>
                                    <td align="center">1011.3</td>
                                </tr>
                                <tr>
                                    <td align="left">Agustus</td>
        <!--                             <td align="center">1012.4</td>
                                    <td align="center">1013.3</td>
                                    <td align="center">1012.8</td>
                                    <td align="center">1014.2</td>
                                    <td align="center">1012.9</td> -->
                                    <td align="center">1010.6</td>
                                    <td align="center">1012.5</td>
                                    <td align="center">1013.3</td>
                                    <td align="center">1013.9</td>
                                    <td align="center">1011.9</td>
                                </tr>
                                <tr>
                                    <td align="left">September</td>
        <!--                             <td align="center">1012.6</td>
                                    <td align="center">1012.7</td>
                                    <td align="center">1012.8</td>
                                    <td align="center">1014.6</td>
                                    <td align="center">1013.1</td> -->
                                    <td align="center">1010.1</td>
                                    <td align="center">1012.7</td>
                                    <td align="center">1013.2</td>
                                    <td align="center">1014.4</td>
                                    <td align="center">1012.0</td>
                                </tr>
                                <tr>
                                    <td align="left">Oktober</td>
        <!--                             <td align="center">1010.8</td>
                                    <td align="center">1011.1</td>
                                    <td align="center">1012.4</td>
                                    <td align="center">1013.0</td>
                                    <td align="center">1012.6</td> -->
                                    <td align="center">1009.2</td>
                                    <td align="center">1011.2</td>
                                    <td align="center">1012.7</td>
                                    <td align="center">1012.1</td>
                                    <td align="center">1010.8</td>
                                </tr>
                                <tr>
                                    <td align="left">November</td>
        <!--                             <td align="center">1008.9</td>
                                    <td align="center">1010.0</td>
                                    <td align="center">1009.5</td>
                                    <td align="center">1009.5</td>
                                    <td align="center">1009.7</td> -->
                                    <td align="center">1008.9</td>
                                    <td align="center">1008.3</td>
                                    <td align="center">1010.9</td>
                                    <td align="center">1011.3</td>
                                    <td align="center">1010.2</td>
                                </tr>
                                <tr>
                                    <td align="left">Desember</td>
        <!--                             <td align="center">1008.6</td>
                                    <td align="center">1008.5</td>
                                    <td align="center">1008.8</td>
                                    <td align="center">1009.4</td>
                                    <td align="center">1009.7</td> -->
                                    <td align="center">1007.9</td>
                                    <td align="center">1008.7</td>
                                    <td align="center">1009.3</td>
                                    <td align="center">1009.7</td>
                                    <td align="center">1007.9</td>
                                </tr>
                            </tbody>
                        </table>              
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
                                    <td align="center" rowspan="2" style="padding: 20px 0px;">Bulan</td>
                                    <td align="center" colspan="9">Penyinaran Matahari (%)</td>
                                </tr>
                                <tr style="background-color:#f0ecec; font-weight:bold;">
        <!--                             <td align="center">2011</td>
                                    <td align="center">2012</td>
                                    <td align="center">2013</td>
                                    <td align="center">2014</td>
                                    <td align="center">2015</td> -->
                                    <td align="center">2016</td>
                                    <td align="center">2017</td>
                                    <td align="center">2018</td>
                                    <td align="center">2019</td>
                                    <td align="center">2020</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="left">Januari</td>
        <!--                             <td align="center">44</td>
                                    <td align="center">38</td>
                                    <td align="center">45</td>
                                    <td align="center">57</td>
                                    <td align="center">55</td> -->
                                    <td align="center">71</td>
                                    <td align="center">44</td>
                                    <td align="center">38</td>
                                    <td align="center">53</td>
                                    <td align="center">65</td>
                                </tr>
                                <tr>
                                    <td align="left">Februari</td>
        <!--                             <td align="center">53</td>
                                    <td align="center">69</td>
                                    <td align="center">71</td>
                                    <td align="center">56</td>
                                    <td align="center">73</td> -->
                                    <td align="center">49</td>
                                    <td align="center">68</td>
                                    <td align="center">59</td>
                                    <td align="center">65</td>
                                    <td align="center">61</td>
                                </tr>
                                <tr>
                                    <td align="left">Maret</td>
        <!--                             <td align="center">56</td>
                                    <td align="center">50</td>
                                    <td align="center">72</td>
                                    <td align="center">87</td>
                                    <td align="center">67</td> -->
                                    <td align="center">81</td>
                                    <td align="center">68</td>
                                    <td align="center">72</td>
                                    <td align="center">58</td>
                                    <td align="center">65</td>
                                </tr>
                                <tr>
                                    <td align="left">April</td>
                       <!--              <td align="center">61</td>
                                    <td align="center">93</td>
                                    <td align="center">67</td>
                                    <td align="center">86</td>
                                    <td align="center">61</td> -->
                                    <td align="center">76</td>
                                    <td align="center">81</td>
                                    <td align="center">94</td>
                                    <td align="center">81</td>
                                    <td align="center">72</td>
                                </tr>
                                <tr>
                                    <td align="left">Mei</td>
        <!--                             <td align="center">75</td>
                                    <td align="center">73</td>
                                    <td align="center">70</td>
                                    <td align="center">98</td>
                                    <td align="center">87</td> -->
                                    <td align="center">83</td>
                                    <td align="center">75</td>
                                    <td align="center">86</td>
                                    <td align="center">93</td>
                                    <td align="center">70</td>
                                </tr>
                                <tr>
                                    <td align="left">Juni</td>
        <!--                             <td align="center">83</td>
                                    <td align="center">81</td>
                                    <td align="center">58</td>
                                    <td align="center">85</td>
                                    <td align="center">81</td> -->
                                    <td align="center">79</td>
                                    <td align="center">76</td>
                                    <td align="center">75</td>
                                    <td align="center">81</td>
                                    <td align="center">82</td>
                                </tr>
                                <tr>
                                    <td align="left">Juli</td>
        <!--                             <td align="center">92</td>
                                    <td align="center">72</td>
                                    <td align="center">60</td>
                                    <td align="center">70</td>
                                    <td align="center">90</td> -->
                                    <td align="center">76</td>
                                    <td align="center">62</td>
                                    <td align="center">76</td>
                                    <td align="center">84</td>
                                    <td align="center">80</td>
                                </tr>
                                <tr>
                                    <td align="left">Agustus</td>
        <!--                             <td align="center">88</td>
                                    <td align="center">90</td>
                                    <td align="center">87</td>
                                    <td align="center">93</td>
                                    <td align="center">83</td> -->
                                    <td align="center">80</td>
                                    <td align="center">91</td>
                                    <td align="center">68</td>
                                    <td align="center">87</td>
                                    <td align="center">81</td>
                                </tr>
                                <tr>
                                    <td align="left">September</td>
        <!--                             <td align="center">86</td>
                                    <td align="center">95</td>
                                    <td align="center">96</td>
                                    <td align="center">98</td>
                                    <td align="center">97</td> -->
                                    <td align="center">95</td>
                                    <td align="center">101</td>
                                    <td align="center">91</td>
                                    <td align="center">94</td>
                                    <td align="center">89</td>
                                </tr>
                                <tr>
                                    <td align="left">Oktober</td>
        <!--                             <td align="center">88</td>
                                    <td align="center">95</td>
                                    <td align="center">99</td>
                                    <td align="center">99</td>
                                    <td align="center">98</td> -->
                                    <td align="center">76</td>
                                    <td align="center">97</td>
                                    <td align="center">99</td>
                                    <td align="center">99</td>
                                    <td align="center">73</td>
                                </tr>
                                <tr>
                                    <td align="left">November</td>
        <!--                             <td align="center">75</td>
                                    <td align="center">92</td>
                                    <td align="center">67</td>
                                    <td align="center">83</td>
                                    <td align="center">92</td> -->
                                    <td align="center">73</td>
                                    <td align="center">58</td>
                                    <td align="center">80</td>
                                    <td align="center">94</td>
                                    <td align="center">74</td>
                                </tr>
                                <tr>
                                    <td align="left">Desember</td>
        <!--                             <td align="center">65</td>
                                    <td align="center">58</td>
                                    <td align="center">61</td>
                                    <td align="center">57</td>
                                    <td align="center">57</td> -->
                                    <td align="center">41</td>
                                    <td align="center">45</td>
                                    <td align="center">47</td>
                                    <td align="center">83</td>
                                    <td align="center">42</td>
                                </tr>
                            </tbody>
                        </table>
        
                        <p align="right">Sumber : Badan Meteorologi, Klimatologi dan Geofisika Banyuwangi</p>
                    </div>
                </div>
            </div>
        
        </div>


    </article>

    {{-- <aside class="container">
        <nav>
            <a style="color: #0DCEDA !important" href="{{ route('budaya.sejarah') }}">Telusuri juga Budaya Banyuwangi</a>
        </nav>
    </aside> --}}

    <div style="height: 3rem;"></div>

@endsection
