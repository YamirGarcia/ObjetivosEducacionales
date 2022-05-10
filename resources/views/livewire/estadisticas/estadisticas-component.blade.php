<div style="background:rgba(255,255,255,0.5 )">

    {{-- <h2>Juan escutia</h2> --}}
    
    <div id="container" style="width:85%; margin: 5rem auto; "></div>

    <div id="container10" style="width:85%; margin: 5rem auto;"></div>
 
    {{$data}}



   <script>
    Highcharts.setOptions({
        lang: {
            months: [
                'Janvier', 'Février', 'Mars', 'Avril',
                'Mai', 'Juin', 'Juillet', 'Août',
                'Septembre', 'Octobre', 'Novembre', 'Décembre'
            ],
            weekdays: [
                'Dimanche', 'Lundi', 'Mardi', 'Mercredi',
                'Jeudi', 'Vendredi', 'Samedi'
            ],
            carreras: [
                <?= $data ?>
            ]
        }
    });
    Highcharts.chart('container', {
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: '3D chart with null values'
        },
        subtitle: {
            text: 'Notice the difference between a 0 value and a null point'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: Highcharts.getOptions().lang.carreras,
            // data: <?= $data?>,
            labels: {
                skew3d: true,
                style: {
                    fontSize: '16px'
                }
            }
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'id',
            data: <?= $data ?>
        }]
    });

    let clrs = Highcharts.getOptions().colors;
    let pieColors = [clrs[2], clrs[0], clrs[3], clrs[1], clrs[4]];

// Get a default pattern, but using the pieColors above.
// The i-argument refers to which default pattern to use
    function getPattern(i) {
        return {
            pattern: Highcharts.merge(Highcharts.patterns[i], {
                color: pieColors[i]
            })
        };
    }

    // Get 5 patterns
    var patterns = [0, 1, 2, 3, 4].map(getPattern);

    var chart = Highcharts.chart('container10', {
        chart: {
            type: 'pie'
        },

        title: {
            text: 'Primary desktop/laptop screen readers'
        },

        subtitle: {
            text: 'Source: WebAIM. Click on point to visit official website'
        },

        colors: patterns,

        tooltip: {
            valueSuffix: '%',
            borderColor: '#8ae'
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    connectorColor: '#777',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                },
                // point: {
                //     events: {
                //         click: function () {
                //             window.location.href = this.website;
                //         }
                //     }
                // },
                cursor: 'pirate',
                borderWidth: 3
            }
        },

        series: [{
            name: 'Screen reader usage',
            data: [{
                name: 'NVDA',
                y: 40.6,
                // website: 'https://www.nvaccess.org',
                // accessibility: {
                //     description: 'This is the most used desktop screen reader'
                // }
            }, {
                name: 'JAWS',
                y: 40.1,
                // website: 'https://www.freedomscientific.com/Products/Blindness/JAWS'
            }, {
                name: 'VoiceOver',
                y: 12.9,
                // website: 'http://www.apple.com/accessibility/osx/voiceover'
            }, {
                name: 'ZoomText',
                y: 2,
                // website: 'http://www.zoomtext.com/products/zoomtext-magnifierreader'
            }, {
                name: 'Other',
                y: 4.4,
                // website: 'http://www.disabled-world.com/assistivedevices/computer/screen-readers.php'
            }]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    plotOptions: {
                        series: {
                            dataLabels: {
                                format: '<b>{point.name}</b>'
                            }
                        }
                    }
                }
            }]
        }
    });

    // Toggle patterns enabled
    document.getElementById('patterns-enabled').onclick = function () {
        chart.update({
            colors: this.checked ? patterns : pieColors
        });
    };
// -------------------------------------------------------------------------
    //    Highcharts.chart('container', {

    //     title: {
    //     text: 'Solar Employment Growth by Sector, 2010-2016'
    //     },

    //     credits: {
    //         enabled: false
    //     },

    //     subtitle: {
    //     text: 'Source: thesolarfoundation.com'
    //     },

    //     yAxis: {
    //     title: {
    //         text: 'Number of Employees'
    //     }
    //     },

    //     xAxis: {
    //     accessibility: {
    //         rangeDescription: 'Range: 2010 to 2017'
    //     }
    //     },

    //     legend: {
    //     layout: 'vertical',
    //     align: 'right',
    //     verticalAlign: 'middle'
    //     },

    //     plotOptions: {
    //     series: {
    //         label: {
    //         connectorAllowed: false
    //         },
    //         pointStart: 2010
    //     }
    //     },

    //     series: [{
    //     name: 'Installation',
    //     data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    //     }, {
    //     name: 'Manufacturing',
    //     data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    //     }, {
    //     name: 'Sales & Distribution',
    //     data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    //     }, {
    //     name: 'Project Development',
    //     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    //     }, {
    //     name: 'Other',
    //     data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    //     }],

    //     responsive: {
    //     rules: [{
    //         condition: {
    //         maxWidth: 500
    //         },
    //         chartOptions: {
    //         legend: {
    //             layout: 'horizontal',
    //             align: 'center',
    //             verticalAlign: 'bottom'
    //         }
    //         }
    //     }]
    //     }

    //     });

        Highcharts.chart('container2', {

        title: {
        text: 'Solar Employment Growth by Sector, 2010-2016'
        },

        subtitle: {
        text: 'Source: thesolarfoundation.com'
        },

        yAxis: {
        title: {
            text: 'Number of Employees'
        }
        },

        xAxis: {
        accessibility: {
            rangeDescription: 'Range: 2010 to 2017'
        }
        },

        legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
        },

        plotOptions: {
        series: {
            label: {
            connectorAllowed: false
            },
            pointStart: 2010
        }
        },

        series: [{
        name: 'Installation',
        data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
        }, {
        name: 'Manufacturing',
        data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
        }, {
        name: 'Sales & Distribution',
        data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
        }, {
        name: 'Project Development',
        data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
        }, {
        name: 'Other',
        data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
        }],

        responsive: {
        rules: [{
            condition: {
            maxWidth: 500
            },
            chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
            }
        }]
        }

        });
   </script>
    
</div>
