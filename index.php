<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Weblorem_Theme
 */

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">

    <style>
        @media print {
            *, ::after, ::before {
                text-shadow: none !important;
                box-shadow: none !important
            }

            a, a:visited {
                text-decoration: underline
            }

            abbr[title]::after {
                content: " (" attr(title) ")"
            }

            pre {
                white-space: pre-wrap !important
            }

            blockquote, pre {
                border: 1px solid #999;
                page-break-inside: avoid
            }

            thead {
                display: table-header-group
            }

            img, tr {
                page-break-inside: avoid
            }

            h2, h3, p {
                orphans: 3;
                widows: 3
            }

            h2, h3 {
                page-break-after: avoid
            }

            .navbar {
                display: none
            }

            .badge {
                border: 1px solid #000
            }

            .table {
                border-collapse: collapse !important
            }

            .table td, .table th {
                background-color: #fff !important
            }

            .table-bordered td, .table-bordered th {
                border: 1px solid #ddd !important
            }
        }

        *, ::after, ::before {
            box-sizing: border-box
        }

        html {
            font-family: sans-serif;
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -ms-overflow-style: scrollbar;
            -webkit-tap-highlight-color: transparent
        }

        article, aside, dialog, figcaption, figure, footer, header, hgroup, main, nav, section {
            display: block
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff
        }

        [tabindex="-1"]:focus {
            outline: 0 !important
        }

        hr {
            box-sizing: content-box;
            height: 0;
            overflow: visible
        }

        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            margin-bottom: .5rem
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        abbr[data-original-title], abbr[title] {
            text-decoration: underline;
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted;
            cursor: help;
            border-bottom: 0
        }

        address {
            margin-bottom: 1rem;
            font-style: normal;
            line-height: inherit
        }

        dl, ol, ul {
            margin-top: 0;
            margin-bottom: 1rem
        }

        ol ol, ol ul, ul ol, ul ul {
            margin-bottom: 0
        }

        dt {
            font-weight: 700
        }

        dd {
            margin-bottom: .5rem;
            margin-left: 0
        }

        blockquote {
            margin: 0 0 1rem
        }

        dfn {
            font-style: italic
        }

        b, strong {
            font-weight: bolder
        }

        small {
            font-size: 80%
        }

        sub, sup {
            position: relative;
            font-size: 75%;
            line-height: 0;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        a {
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
            -webkit-text-decoration-skip: objects
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline
        }

        a:not([href]):not([tabindex]) {
            color: inherit;
            text-decoration: none
        }

        a:not([href]):not([tabindex]):focus, a:not([href]):not([tabindex]):hover {
            color: inherit;
            text-decoration: none
        }

        a:not([href]):not([tabindex]):focus {
            outline: 0
        }

        code, kbd, pre, samp {
            font-family: monospace, monospace;
            font-size: 1em
        }

        pre {
            margin-top: 0;
            margin-bottom: 1rem;
            overflow: auto;
            -ms-overflow-style: scrollbar
        }

        figure {
            margin: 0 0 1rem
        }

        img {
            vertical-align: middle;
            border-style: none
        }

        svg:not(:root) {
            overflow: hidden
        }

        [role=button], a, area, button, input:not([type=range]), label, select, summary, textarea {
            -ms-touch-action: manipulation;
            touch-action: manipulation
        }

        table {
            border-collapse: collapse
        }

        caption {
            padding-top: .75rem;
            padding-bottom: .75rem;
            color: #868e96;
            text-align: left;
            caption-side: bottom
        }

        th {
            text-align: inherit
        }

        label {
            display: inline-block;
            margin-bottom: .5rem
        }

        button {
            border-radius: 0
        }

        button:focus {
            outline: 1px dotted;
            outline: 5px auto -webkit-focus-ring-color
        }

        button, input, optgroup, select, textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit
        }

        button, input {
            overflow: visible
        }

        button, select {
            text-transform: none
        }

        [type=reset], [type=submit], button, html [type=button] {
            -webkit-appearance: button
        }

        [type=button]::-moz-focus-inner, [type=reset]::-moz-focus-inner, [type=submit]::-moz-focus-inner, button::-moz-focus-inner {
            padding: 0;
            border-style: none
        }

        input[type=checkbox], input[type=radio] {
            box-sizing: border-box;
            padding: 0
        }

        input[type=date], input[type=datetime-local], input[type=month], input[type=time] {
            -webkit-appearance: listbox
        }

        textarea {
            overflow: auto;
            resize: vertical
        }

        fieldset {
            min-width: 0;
            padding: 0;
            margin: 0;
            border: 0
        }

        legend {
            display: block;
            width: 100%;
            max-width: 100%;
            padding: 0;
            margin-bottom: .5rem;
            font-size: 1.5rem;
            line-height: inherit;
            color: inherit;
            white-space: normal
        }

        progress {
            vertical-align: baseline
        }

        [type=number]::-webkit-inner-spin-button, [type=number]::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            outline-offset: -2px;
            -webkit-appearance: none
        }

        [type=search]::-webkit-search-cancel-button, [type=search]::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button
        }

        output {
            display: inline-block
        }

        summary {
            display: list-item
        }

        template {
            display: none
        }

        [hidden] {
            display: none !important
        }

        .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
            margin-bottom: .5rem;
            font-family: inherit;
            font-weight: 500;
            line-height: 1.2;
            color: inherit
        }

        .h1, h1 {
            font-size: 2.5rem
        }

        .h2, h2 {
            font-size: 2rem
        }

        .h3, h3 {
            font-size: 1.75rem
        }

        .h4, h4 {
            font-size: 1.5rem
        }

        .h5, h5 {
            font-size: 1.25rem
        }

        .h6, h6 {
            font-size: 1rem
        }

        .lead {
            font-size: 1.25rem;
            font-weight: 300
        }

        .display-1 {
            font-size: 6rem;
            font-weight: 300;
            line-height: 1.2
        }

        .display-2 {
            font-size: 5.5rem;
            font-weight: 300;
            line-height: 1.2
        }

        .display-3 {
            font-size: 4.5rem;
            font-weight: 300;
            line-height: 1.2
        }

        .display-4 {
            font-size: 3.5rem;
            font-weight: 300;
            line-height: 1.2
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1)
        }

        .small, small {
            font-size: 80%;
            font-weight: 400
        }

        .mark, mark {
            padding: .2em;
            background-color: #fcf8e3
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none
        }

        .list-inline {
            padding-left: 0;
            list-style: none
        }

        .list-inline-item {
            display: inline-block
        }

        .list-inline-item:not(:last-child) {
            margin-right: 5px
        }

        .initialism {
            font-size: 90%;
            text-transform: uppercase
        }

        .blockquote {
            margin-bottom: 1rem;
            font-size: 1.25rem
        }

        .blockquote-footer {
            display: block;
            font-size: 80%;
            color: #868e96
        }

        .blockquote-footer::before {
            content: "\2014 \00A0"
        }

        .img-fluid {
            max-width: 100%;
            height: auto
        }

        .img-thumbnail {
            padding: .25rem;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: .25rem;
            transition: all .2s ease-in-out;
            max-width: 100%;
            height: auto
        }

        .figure {
            display: inline-block
        }

        .figure-img {
            margin-bottom: .5rem;
            line-height: 1
        }

        .figure-caption {
            font-size: 90%;
            color: #868e96
        }

        code, kbd, pre, samp {
            font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace
        }

        code {
            padding: .2rem .4rem;
            font-size: 90%;
            color: #bd4147;
            background-color: #f8f9fa;
            border-radius: .25rem
        }

        a > code {
            padding: 0;
            color: inherit;
            background-color: inherit
        }

        kbd {
            padding: .2rem .4rem;
            font-size: 90%;
            color: #fff;
            background-color: #212529;
            border-radius: .2rem
        }

        kbd kbd {
            padding: 0;
            font-size: 100%;
            font-weight: 700
        }

        pre {
            display: block;
            margin-top: 0;
            margin-bottom: 1rem;
            font-size: 90%;
            color: #212529
        }

        pre code {
            padding: 0;
            font-size: inherit;
            color: inherit;
            background-color: transparent;
            border-radius: 0
        }

        .pre-scrollable {
            max-height: 340px;
            overflow-y: scroll
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto
        }

        @media (min-width: 576px) {
            .container {
                max-width: 540px
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 720px
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 960px
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px
            }
        }

        .container-fluid {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px
        }

        .no-gutters {
            margin-right: 0;
            margin-left: 0
        }

        .no-gutters > .col, .no-gutters > [class*=col-] {
            padding-right: 0;
            padding-left: 0
        }

        .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px
        }

        .col {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%
        }

        .col-auto {
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto;
            max-width: none
        }

        .col-1 {
            -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
            max-width: 8.333333%
        }

        .col-2 {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .col-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .col-5 {
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%
        }

        .col-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .col-7 {
            -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
            max-width: 58.333333%
        }

        .col-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%
        }

        .col-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%
        }

        .col-10 {
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%
        }

        .col-11 {
            -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
            max-width: 91.666667%
        }

        .col-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

        .order-first {
            -ms-flex-order: -1;
            order: -1
        }

        .order-1 {
            -ms-flex-order: 1;
            order: 1
        }

        .order-2 {
            -ms-flex-order: 2;
            order: 2
        }

        .order-3 {
            -ms-flex-order: 3;
            order: 3
        }

        .order-4 {
            -ms-flex-order: 4;
            order: 4
        }

        .order-5 {
            -ms-flex-order: 5;
            order: 5
        }

        .order-6 {
            -ms-flex-order: 6;
            order: 6
        }

        .order-7 {
            -ms-flex-order: 7;
            order: 7
        }

        .order-8 {
            -ms-flex-order: 8;
            order: 8
        }

        .order-9 {
            -ms-flex-order: 9;
            order: 9
        }

        .order-10 {
            -ms-flex-order: 10;
            order: 10
        }

        .order-11 {
            -ms-flex-order: 11;
            order: 11
        }

        .order-12 {
            -ms-flex-order: 12;
            order: 12
        }

        .offset-1 {
            margin-left: 8.333333%
        }

        .offset-2 {
            margin-left: 16.666667%
        }

        .offset-3 {
            margin-left: 25%
        }

        .offset-4 {
            margin-left: 33.333333%
        }

        .offset-5 {
            margin-left: 41.666667%
        }

        .offset-6 {
            margin-left: 50%
        }

        .offset-7 {
            margin-left: 58.333333%
        }

        .offset-8 {
            margin-left: 66.666667%
        }

        .offset-9 {
            margin-left: 75%
        }

        .offset-10 {
            margin-left: 83.333333%
        }

        .offset-11 {
            margin-left: 91.666667%
        }

        @media (min-width: 576px) {
            .col-sm {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%
            }

            .col-sm-auto {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto;
                max-width: none
            }

            .col-sm-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%
            }

            .col-sm-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%
            }

            .col-sm-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%
            }

            .col-sm-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%
            }

            .col-sm-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%
            }

            .col-sm-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }

            .col-sm-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%
            }

            .col-sm-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%
            }

            .col-sm-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%
            }

            .col-sm-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%
            }

            .col-sm-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%
            }

            .col-sm-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }

            .order-sm-first {
                -ms-flex-order: -1;
                order: -1
            }

            .order-sm-1 {
                -ms-flex-order: 1;
                order: 1
            }

            .order-sm-2 {
                -ms-flex-order: 2;
                order: 2
            }

            .order-sm-3 {
                -ms-flex-order: 3;
                order: 3
            }

            .order-sm-4 {
                -ms-flex-order: 4;
                order: 4
            }

            .order-sm-5 {
                -ms-flex-order: 5;
                order: 5
            }

            .order-sm-6 {
                -ms-flex-order: 6;
                order: 6
            }

            .order-sm-7 {
                -ms-flex-order: 7;
                order: 7
            }

            .order-sm-8 {
                -ms-flex-order: 8;
                order: 8
            }

            .order-sm-9 {
                -ms-flex-order: 9;
                order: 9
            }

            .order-sm-10 {
                -ms-flex-order: 10;
                order: 10
            }

            .order-sm-11 {
                -ms-flex-order: 11;
                order: 11
            }

            .order-sm-12 {
                -ms-flex-order: 12;
                order: 12
            }

            .offset-sm-0 {
                margin-left: 0
            }

            .offset-sm-1 {
                margin-left: 8.333333%
            }

            .offset-sm-2 {
                margin-left: 16.666667%
            }

            .offset-sm-3 {
                margin-left: 25%
            }

            .offset-sm-4 {
                margin-left: 33.333333%
            }

            .offset-sm-5 {
                margin-left: 41.666667%
            }

            .offset-sm-6 {
                margin-left: 50%
            }

            .offset-sm-7 {
                margin-left: 58.333333%
            }

            .offset-sm-8 {
                margin-left: 66.666667%
            }

            .offset-sm-9 {
                margin-left: 75%
            }

            .offset-sm-10 {
                margin-left: 83.333333%
            }

            .offset-sm-11 {
                margin-left: 91.666667%
            }
        }

        @media (min-width: 768px) {
            .col-md {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%
            }

            .col-md-auto {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto;
                max-width: none
            }

            .col-md-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%
            }

            .col-md-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%
            }

            .col-md-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%
            }

            .col-md-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%
            }

            .col-md-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%
            }

            .col-md-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }

            .col-md-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%
            }

            .col-md-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%
            }

            .col-md-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%
            }

            .col-md-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%
            }

            .col-md-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%
            }

            .col-md-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }

            .order-md-first {
                -ms-flex-order: -1;
                order: -1
            }

            .order-md-1 {
                -ms-flex-order: 1;
                order: 1
            }

            .order-md-2 {
                -ms-flex-order: 2;
                order: 2
            }

            .order-md-3 {
                -ms-flex-order: 3;
                order: 3
            }

            .order-md-4 {
                -ms-flex-order: 4;
                order: 4
            }

            .order-md-5 {
                -ms-flex-order: 5;
                order: 5
            }

            .order-md-6 {
                -ms-flex-order: 6;
                order: 6
            }

            .order-md-7 {
                -ms-flex-order: 7;
                order: 7
            }

            .order-md-8 {
                -ms-flex-order: 8;
                order: 8
            }

            .order-md-9 {
                -ms-flex-order: 9;
                order: 9
            }

            .order-md-10 {
                -ms-flex-order: 10;
                order: 10
            }

            .order-md-11 {
                -ms-flex-order: 11;
                order: 11
            }

            .order-md-12 {
                -ms-flex-order: 12;
                order: 12
            }

            .offset-md-0 {
                margin-left: 0
            }

            .offset-md-1 {
                margin-left: 8.333333%
            }

            .offset-md-2 {
                margin-left: 16.666667%
            }

            .offset-md-3 {
                margin-left: 25%
            }

            .offset-md-4 {
                margin-left: 33.333333%
            }

            .offset-md-5 {
                margin-left: 41.666667%
            }

            .offset-md-6 {
                margin-left: 50%
            }

            .offset-md-7 {
                margin-left: 58.333333%
            }

            .offset-md-8 {
                margin-left: 66.666667%
            }

            .offset-md-9 {
                margin-left: 75%
            }

            .offset-md-10 {
                margin-left: 83.333333%
            }

            .offset-md-11 {
                margin-left: 91.666667%
            }
        }

        @media (min-width: 992px) {
            .col-lg {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%
            }

            .col-lg-auto {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto;
                max-width: none
            }

            .col-lg-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%
            }

            .col-lg-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%
            }

            .col-lg-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%
            }

            .col-lg-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%
            }

            .col-lg-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%
            }

            .col-lg-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }

            .col-lg-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%
            }

            .col-lg-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%
            }

            .col-lg-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%
            }

            .col-lg-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%
            }

            .col-lg-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%
            }

            .col-lg-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }

            .order-lg-first {
                -ms-flex-order: -1;
                order: -1
            }

            .order-lg-1 {
                -ms-flex-order: 1;
                order: 1
            }

            .order-lg-2 {
                -ms-flex-order: 2;
                order: 2
            }

            .order-lg-3 {
                -ms-flex-order: 3;
                order: 3
            }

            .order-lg-4 {
                -ms-flex-order: 4;
                order: 4
            }

            .order-lg-5 {
                -ms-flex-order: 5;
                order: 5
            }

            .order-lg-6 {
                -ms-flex-order: 6;
                order: 6
            }

            .order-lg-7 {
                -ms-flex-order: 7;
                order: 7
            }

            .order-lg-8 {
                -ms-flex-order: 8;
                order: 8
            }

            .order-lg-9 {
                -ms-flex-order: 9;
                order: 9
            }

            .order-lg-10 {
                -ms-flex-order: 10;
                order: 10
            }

            .order-lg-11 {
                -ms-flex-order: 11;
                order: 11
            }

            .order-lg-12 {
                -ms-flex-order: 12;
                order: 12
            }

            .offset-lg-0 {
                margin-left: 0
            }

            .offset-lg-1 {
                margin-left: 8.333333%
            }

            .offset-lg-2 {
                margin-left: 16.666667%
            }

            .offset-lg-3 {
                margin-left: 25%
            }

            .offset-lg-4 {
                margin-left: 33.333333%
            }

            .offset-lg-5 {
                margin-left: 41.666667%
            }

            .offset-lg-6 {
                margin-left: 50%
            }

            .offset-lg-7 {
                margin-left: 58.333333%
            }

            .offset-lg-8 {
                margin-left: 66.666667%
            }

            .offset-lg-9 {
                margin-left: 75%
            }

            .offset-lg-10 {
                margin-left: 83.333333%
            }

            .offset-lg-11 {
                margin-left: 91.666667%
            }
        }

        @media (min-width: 1200px) {
            .col-xl {
                -ms-flex-preferred-size: 0;
                flex-basis: 0;
                -ms-flex-positive: 1;
                flex-grow: 1;
                max-width: 100%
            }

            .col-xl-auto {
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                width: auto;
                max-width: none
            }

            .col-xl-1 {
                -ms-flex: 0 0 8.333333%;
                flex: 0 0 8.333333%;
                max-width: 8.333333%
            }

            .col-xl-2 {
                -ms-flex: 0 0 16.666667%;
                flex: 0 0 16.666667%;
                max-width: 16.666667%
            }

            .col-xl-3 {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%
            }

            .col-xl-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%
            }

            .col-xl-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%
            }

            .col-xl-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }

            .col-xl-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%
            }

            .col-xl-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%
            }

            .col-xl-9 {
                -ms-flex: 0 0 75%;
                flex: 0 0 75%;
                max-width: 75%
            }

            .col-xl-10 {
                -ms-flex: 0 0 83.333333%;
                flex: 0 0 83.333333%;
                max-width: 83.333333%
            }

            .col-xl-11 {
                -ms-flex: 0 0 91.666667%;
                flex: 0 0 91.666667%;
                max-width: 91.666667%
            }

            .col-xl-12 {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }

            .order-xl-first {
                -ms-flex-order: -1;
                order: -1
            }

            .order-xl-1 {
                -ms-flex-order: 1;
                order: 1
            }

            .order-xl-2 {
                -ms-flex-order: 2;
                order: 2
            }

            .order-xl-3 {
                -ms-flex-order: 3;
                order: 3
            }

            .order-xl-4 {
                -ms-flex-order: 4;
                order: 4
            }

            .order-xl-5 {
                -ms-flex-order: 5;
                order: 5
            }

            .order-xl-6 {
                -ms-flex-order: 6;
                order: 6
            }

            .order-xl-7 {
                -ms-flex-order: 7;
                order: 7
            }

            .order-xl-8 {
                -ms-flex-order: 8;
                order: 8
            }

            .order-xl-9 {
                -ms-flex-order: 9;
                order: 9
            }

            .order-xl-10 {
                -ms-flex-order: 10;
                order: 10
            }

            .order-xl-11 {
                -ms-flex-order: 11;
                order: 11
            }

            .order-xl-12 {
                -ms-flex-order: 12;
                order: 12
            }

            .offset-xl-0 {
                margin-left: 0
            }

            .offset-xl-1 {
                margin-left: 8.333333%
            }

            .offset-xl-2 {
                margin-left: 16.666667%
            }

            .offset-xl-3 {
                margin-left: 25%
            }

            .offset-xl-4 {
                margin-left: 33.333333%
            }

            .offset-xl-5 {
                margin-left: 41.666667%
            }

            .offset-xl-6 {
                margin-left: 50%
            }

            .offset-xl-7 {
                margin-left: 58.333333%
            }

            .offset-xl-8 {
                margin-left: 66.666667%
            }

            .offset-xl-9 {
                margin-left: 75%
            }

            .offset-xl-10 {
                margin-left: 83.333333%
            }

            .offset-xl-11 {
                margin-left: 91.666667%
            }
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent
        }

        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #e9ecef
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #e9ecef
        }

        .table tbody + tbody {
            border-top: 2px solid #e9ecef
        }

        .table .table {
            background-color: #fff
        }

        .table-sm td, .table-sm th {
            padding: .3rem
        }

        .table-bordered {
            border: 1px solid #e9ecef
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #e9ecef
        }

        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 2px
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .05)
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, .075)
        }

        .table-primary, .table-primary > td, .table-primary > th {
            background-color: #b8daff
        }

        .table-hover .table-primary:hover {
            background-color: #9fcdff
        }

        .table-hover .table-primary:hover > td, .table-hover .table-primary:hover > th {
            background-color: #9fcdff
        }

        .table-secondary, .table-secondary > td, .table-secondary > th {
            background-color: #dddfe2
        }

        .table-hover .table-secondary:hover {
            background-color: #cfd2d6
        }

        .table-hover .table-secondary:hover > td, .table-hover .table-secondary:hover > th {
            background-color: #cfd2d6
        }

        .table-success, .table-success > td, .table-success > th {
            background-color: #c3e6cb
        }

        .table-hover .table-success:hover {
            background-color: #b1dfbb
        }

        .table-hover .table-success:hover > td, .table-hover .table-success:hover > th {
            background-color: #b1dfbb
        }

        .table-info, .table-info > td, .table-info > th {
            background-color: #bee5eb
        }

        .table-hover .table-info:hover {
            background-color: #abdde5
        }

        .table-hover .table-info:hover > td, .table-hover .table-info:hover > th {
            background-color: #abdde5
        }

        .table-warning, .table-warning > td, .table-warning > th {
            background-color: #ffeeba
        }

        .table-hover .table-warning:hover {
            background-color: #ffe8a1
        }

        .table-hover .table-warning:hover > td, .table-hover .table-warning:hover > th {
            background-color: #ffe8a1
        }

        .table-danger, .table-danger > td, .table-danger > th {
            background-color: #f5c6cb
        }

        .table-hover .table-danger:hover {
            background-color: #f1b0b7
        }

        .table-hover .table-danger:hover > td, .table-hover .table-danger:hover > th {
            background-color: #f1b0b7
        }

        .table-light, .table-light > td, .table-light > th {
            background-color: #fdfdfe
        }

        .table-hover .table-light:hover {
            background-color: #ececf6
        }

        .table-hover .table-light:hover > td, .table-hover .table-light:hover > th {
            background-color: #ececf6
        }

        .table-dark, .table-dark > td, .table-dark > th {
            background-color: #c6c8ca
        }

        .table-hover .table-dark:hover {
            background-color: #b9bbbe
        }

        .table-hover .table-dark:hover > td, .table-hover .table-dark:hover > th {
            background-color: #b9bbbe
        }

        .table-active, .table-active > td, .table-active > th {
            background-color: rgba(0, 0, 0, .075)
        }

        .table-hover .table-active:hover {
            background-color: rgba(0, 0, 0, .075)
        }

        .table-hover .table-active:hover > td, .table-hover .table-active:hover > th {
            background-color: rgba(0, 0, 0, .075)
        }

        .table .thead-dark th {
            color: #fff;
            background-color: #212529;
            border-color: #32383e
        }

        .table .thead-light th {
            color: #495057;
            background-color: #e9ecef;
            border-color: #e9ecef
        }

        .table-dark {
            color: #fff;
            background-color: #212529
        }

        .table-dark td, .table-dark th, .table-dark thead th {
            border-color: #32383e
        }

        .table-dark.table-bordered {
            border: 0
        }

        .table-dark.table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, .05)
        }

        .table-dark.table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, .075)
        }

        @media (max-width: 575px) {
            .table-responsive-sm {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar
            }

            .table-responsive-sm.table-bordered {
                border: 0
            }
        }

        @media (max-width: 767px) {
            .table-responsive-md {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar
            }

            .table-responsive-md.table-bordered {
                border: 0
            }
        }

        @media (max-width: 991px) {
            .table-responsive-lg {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar
            }

            .table-responsive-lg.table-bordered {
                border: 0
            }
        }

        @media (max-width: 1199px) {
            .table-responsive-xl {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar
            }

            .table-responsive-xl.table-bordered {
                border: 0
            }
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar
        }

        .table-responsive.table-bordered {
            border: 0
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-image: none;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
        }

        .form-control::-ms-expand {
            background-color: transparent;
            border: 0
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25)
        }

        .form-control::-webkit-input-placeholder {
            color: #868e96;
            opacity: 1
        }

        .form-control:-ms-input-placeholder {
            color: #868e96;
            opacity: 1
        }

        .form-control::-ms-input-placeholder {
            color: #868e96;
            opacity: 1
        }

        .form-control::placeholder {
            color: #868e96;
            opacity: 1
        }

        .form-control:disabled, .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1
        }

        select.form-control:not([size]):not([multiple]) {
            height: calc(2.25rem + 2px)
        }

        select.form-control:focus::-ms-value {
            color: #495057;
            background-color: #fff
        }

        .form-control-file, .form-control-range {
            display: block
        }

        .col-form-label {
            padding-top: calc(.375rem + 1px);
            padding-bottom: calc(.375rem + 1px);
            margin-bottom: 0;
            line-height: 1.5
        }

        .col-form-label-lg {
            padding-top: calc(.5rem + 1px);
            padding-bottom: calc(.5rem + 1px);
            font-size: 1.25rem;
            line-height: 1.5
        }

        .col-form-label-sm {
            padding-top: calc(.25rem + 1px);
            padding-bottom: calc(.25rem + 1px);
            font-size: .875rem;
            line-height: 1.5
        }

        .col-form-legend {
            padding-top: .375rem;
            padding-bottom: .375rem;
            margin-bottom: 0;
            font-size: 1rem
        }

        .form-control-plaintext {
            padding-top: .375rem;
            padding-bottom: .375rem;
            margin-bottom: 0;
            line-height: 1.5;
            background-color: transparent;
            border: solid transparent;
            border-width: 1px 0
        }

        .form-control-plaintext.form-control-lg, .form-control-plaintext.form-control-sm, .input-group-lg > .form-control-plaintext.form-control, .input-group-lg > .form-control-plaintext.input-group-addon, .input-group-lg > .input-group-btn > .form-control-plaintext.btn, .input-group-sm > .form-control-plaintext.form-control, .input-group-sm > .form-control-plaintext.input-group-addon, .input-group-sm > .input-group-btn > .form-control-plaintext.btn {
            padding-right: 0;
            padding-left: 0
        }

        .form-control-sm, .input-group-sm > .form-control, .input-group-sm > .input-group-addon, .input-group-sm > .input-group-btn > .btn {
            padding: .25rem .5rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: .2rem
        }

        .input-group-sm > .input-group-btn > select.btn:not([size]):not([multiple]), .input-group-sm > select.form-control:not([size]):not([multiple]), .input-group-sm > select.input-group-addon:not([size]):not([multiple]), select.form-control-sm:not([size]):not([multiple]) {
            height: calc(1.8125rem + 2px)
        }

        .form-control-lg, .input-group-lg > .form-control, .input-group-lg > .input-group-addon, .input-group-lg > .input-group-btn > .btn {
            padding: .5rem 1rem;
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: .3rem
        }

        .input-group-lg > .input-group-btn > select.btn:not([size]):not([multiple]), .input-group-lg > select.form-control:not([size]):not([multiple]), .input-group-lg > select.input-group-addon:not([size]):not([multiple]), select.form-control-lg:not([size]):not([multiple]) {
            height: calc(2.875rem + 2px)
        }

        .form-group {
            margin-bottom: 1rem
        }

        .form-text {
            display: block;
            margin-top: .25rem
        }

        .form-row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px
        }

        .form-row > .col, .form-row > [class*=col-] {
            padding-right: 5px;
            padding-left: 5px
        }

        .form-check {
            position: relative;
            display: block;
            margin-bottom: .5rem
        }

        .form-check.disabled .form-check-label {
            color: #868e96
        }

        .form-check-label {
            padding-left: 1.25rem;
            margin-bottom: 0
        }

        .form-check-input {
            position: absolute;
            margin-top: .25rem;
            margin-left: -1.25rem
        }

        .form-check-inline {
            display: inline-block;
            margin-right: .75rem
        }

        .form-check-inline .form-check-label {
            vertical-align: middle
        }

        .valid-feedback {
            display: none;
            margin-top: .25rem;
            font-size: .875rem;
            color: #28a745
        }

        .valid-tooltip {
            position: absolute;
            top: 100%;
            z-index: 5;
            display: none;
            width: 250px;
            padding: .5rem;
            margin-top: .1rem;
            font-size: .875rem;
            line-height: 1;
            color: #fff;
            background-color: rgba(40, 167, 69, .8);
            border-radius: .2rem
        }

        .custom-select.is-valid, .form-control.is-valid, .was-validated .custom-select:valid, .was-validated .form-control:valid {
            border-color: #28a745
        }

        .custom-select.is-valid:focus, .form-control.is-valid:focus, .was-validated .custom-select:valid:focus, .was-validated .form-control:valid:focus {
            box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .25)
        }

        .custom-select.is-valid ~ .valid-feedback, .custom-select.is-valid ~ .valid-tooltip, .form-control.is-valid ~ .valid-feedback, .form-control.is-valid ~ .valid-tooltip, .was-validated .custom-select:valid ~ .valid-feedback, .was-validated .custom-select:valid ~ .valid-tooltip, .was-validated .form-control:valid ~ .valid-feedback, .was-validated .form-control:valid ~ .valid-tooltip {
            display: block
        }

        .form-check-input.is-valid + .form-check-label, .was-validated .form-check-input:valid + .form-check-label {
            color: #28a745
        }

        .custom-control-input.is-valid ~ .custom-control-indicator, .was-validated .custom-control-input:valid ~ .custom-control-indicator {
            background-color: rgba(40, 167, 69, .25)
        }

        .custom-control-input.is-valid ~ .custom-control-description, .was-validated .custom-control-input:valid ~ .custom-control-description {
            color: #28a745
        }

        .custom-file-input.is-valid ~ .custom-file-control, .was-validated .custom-file-input:valid ~ .custom-file-control {
            border-color: #28a745
        }

        .custom-file-input.is-valid ~ .custom-file-control::before, .was-validated .custom-file-input:valid ~ .custom-file-control::before {
            border-color: inherit
        }

        .custom-file-input.is-valid:focus, .was-validated .custom-file-input:valid:focus {
            box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .25)
        }

        .invalid-feedback {
            display: none;
            margin-top: .25rem;
            font-size: .875rem;
            color: #dc3545
        }

        .invalid-tooltip {
            position: absolute;
            top: 100%;
            z-index: 5;
            display: none;
            width: 250px;
            padding: .5rem;
            margin-top: .1rem;
            font-size: .875rem;
            line-height: 1;
            color: #fff;
            background-color: rgba(220, 53, 69, .8);
            border-radius: .2rem
        }

        .custom-select.is-invalid, .form-control.is-invalid, .was-validated .custom-select:invalid, .was-validated .form-control:invalid {
            border-color: #dc3545
        }

        .custom-select.is-invalid:focus, .form-control.is-invalid:focus, .was-validated .custom-select:invalid:focus, .was-validated .form-control:invalid:focus {
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .25)
        }

        .custom-select.is-invalid ~ .invalid-feedback, .custom-select.is-invalid ~ .invalid-tooltip, .form-control.is-invalid ~ .invalid-feedback, .form-control.is-invalid ~ .invalid-tooltip, .was-validated .custom-select:invalid ~ .invalid-feedback, .was-validated .custom-select:invalid ~ .invalid-tooltip, .was-validated .form-control:invalid ~ .invalid-feedback, .was-validated .form-control:invalid ~ .invalid-tooltip {
            display: block
        }

        .form-check-input.is-invalid + .form-check-label, .was-validated .form-check-input:invalid + .form-check-label {
            color: #dc3545
        }

        .custom-control-input.is-invalid ~ .custom-control-indicator, .was-validated .custom-control-input:invalid ~ .custom-control-indicator {
            background-color: rgba(220, 53, 69, .25)
        }

        .custom-control-input.is-invalid ~ .custom-control-description, .was-validated .custom-control-input:invalid ~ .custom-control-description {
            color: #dc3545
        }

        .custom-file-input.is-invalid ~ .custom-file-control, .was-validated .custom-file-input:invalid ~ .custom-file-control {
            border-color: #dc3545
        }

        .custom-file-input.is-invalid ~ .custom-file-control::before, .was-validated .custom-file-input:invalid ~ .custom-file-control::before {
            border-color: inherit
        }

        .custom-file-input.is-invalid:focus, .was-validated .custom-file-input:invalid:focus {
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .25)
        }

        .form-inline {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            -ms-flex-align: center;
            align-items: center
        }

        .form-inline .form-check {
            width: 100%
        }

        @media (min-width: 576px) {
            .form-inline label {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                -ms-flex-pack: center;
                justify-content: center;
                margin-bottom: 0
            }

            .form-inline .form-group {
                display: -ms-flexbox;
                display: flex;
                -ms-flex: 0 0 auto;
                flex: 0 0 auto;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
                -ms-flex-align: center;
                align-items: center;
                margin-bottom: 0
            }

            .form-inline .form-control {
                display: inline-block;
                width: auto;
                vertical-align: middle
            }

            .form-inline .form-control-plaintext {
                display: inline-block
            }

            .form-inline .input-group {
                width: auto
            }

            .form-inline .form-check {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                -ms-flex-pack: center;
                justify-content: center;
                width: auto;
                margin-top: 0;
                margin-bottom: 0
            }

            .form-inline .form-check-label {
                padding-left: 0
            }

            .form-inline .form-check-input {
                position: relative;
                margin-top: 0;
                margin-right: .25rem;
                margin-left: 0
            }

            .form-inline .custom-control {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                -ms-flex-pack: center;
                justify-content: center;
                padding-left: 0
            }

            .form-inline .custom-control-indicator {
                position: static;
                display: inline-block;
                margin-right: .25rem;
                vertical-align: text-bottom
            }

            .form-inline .has-feedback .form-control-feedback {
                top: 0
            }
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }

        .btn:focus, .btn:hover {
            text-decoration: none
        }

        .btn.focus, .btn:focus {
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25)
        }

        .btn.disabled, .btn:disabled {
            opacity: .65
        }

        .btn:not([disabled]):not(.disabled).active, .btn:not([disabled]):not(.disabled):active {
            background-image: none
        }

        a.btn.disabled, fieldset[disabled] a.btn {
            pointer-events: none
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0069d9;
            border-color: #0062cc
        }

        .btn-primary.focus, .btn-primary:focus {
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
        }

        .btn-primary.disabled, .btn-primary:disabled {
            background-color: #007bff;
            border-color: #007bff
        }

        .btn-primary:not([disabled]):not(.disabled).active, .btn-primary:not([disabled]):not(.disabled):active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0062cc;
            border-color: #005cbf;
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
        }

        .btn-secondary {
            color: #fff;
            background-color: #868e96;
            border-color: #868e96
        }

        .btn-secondary:hover {
            color: #fff;
            background-color: #727b84;
            border-color: #6c757d
        }

        .btn-secondary.focus, .btn-secondary:focus {
            box-shadow: 0 0 0 .2rem rgba(134, 142, 150, .5)
        }

        .btn-secondary.disabled, .btn-secondary:disabled {
            background-color: #868e96;
            border-color: #868e96
        }

        .btn-secondary:not([disabled]):not(.disabled).active, .btn-secondary:not([disabled]):not(.disabled):active, .show > .btn-secondary.dropdown-toggle {
            color: #fff;
            background-color: #6c757d;
            border-color: #666e76;
            box-shadow: 0 0 0 .2rem rgba(134, 142, 150, .5)
        }

        .btn-success {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745
        }

        .btn-success:hover {
            color: #fff;
            background-color: #218838;
            border-color: #1e7e34
        }

        .btn-success.focus, .btn-success:focus {
            box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
        }

        .btn-success.disabled, .btn-success:disabled {
            background-color: #28a745;
            border-color: #28a745
        }

        .btn-success:not([disabled]):not(.disabled).active, .btn-success:not([disabled]):not(.disabled):active, .show > .btn-success.dropdown-toggle {
            color: #fff;
            background-color: #1e7e34;
            border-color: #1c7430;
            box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
        }

        .btn-info {
            color: #fff;
            background-color: #17a2b8;
            border-color: #17a2b8
        }

        .btn-info:hover {
            color: #fff;
            background-color: #138496;
            border-color: #117a8b
        }

        .btn-info.focus, .btn-info:focus {
            box-shadow: 0 0 0 .2rem rgba(23, 162, 184, .5)
        }

        .btn-info.disabled, .btn-info:disabled {
            background-color: #17a2b8;
            border-color: #17a2b8
        }

        .btn-info:not([disabled]):not(.disabled).active, .btn-info:not([disabled]):not(.disabled):active, .show > .btn-info.dropdown-toggle {
            color: #fff;
            background-color: #117a8b;
            border-color: #10707f;
            box-shadow: 0 0 0 .2rem rgba(23, 162, 184, .5)
        }

        .btn-warning {
            color: #111;
            background-color: #ffc107;
            border-color: #ffc107
        }

        .btn-warning:hover {
            color: #111;
            background-color: #e0a800;
            border-color: #d39e00
        }

        .btn-warning.focus, .btn-warning:focus {
            box-shadow: 0 0 0 .2rem rgba(255, 193, 7, .5)
        }

        .btn-warning.disabled, .btn-warning:disabled {
            background-color: #ffc107;
            border-color: #ffc107
        }

        .btn-warning:not([disabled]):not(.disabled).active, .btn-warning:not([disabled]):not(.disabled):active, .show > .btn-warning.dropdown-toggle {
            color: #111;
            background-color: #d39e00;
            border-color: #c69500;
            box-shadow: 0 0 0 .2rem rgba(255, 193, 7, .5)
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545
        }

        .btn-danger:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130
        }

        .btn-danger.focus, .btn-danger:focus {
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .5)
        }

        .btn-danger.disabled, .btn-danger:disabled {
            background-color: #dc3545;
            border-color: #dc3545
        }

        .btn-danger:not([disabled]):not(.disabled).active, .btn-danger:not([disabled]):not(.disabled):active, .show > .btn-danger.dropdown-toggle {
            color: #fff;
            background-color: #bd2130;
            border-color: #b21f2d;
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .5)
        }

        .btn-light {
            color: #111;
            background-color: #f8f9fa;
            border-color: #f8f9fa
        }

        .btn-light:hover {
            color: #111;
            background-color: #e2e6ea;
            border-color: #dae0e5
        }

        .btn-light.focus, .btn-light:focus {
            box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5)
        }

        .btn-light.disabled, .btn-light:disabled {
            background-color: #f8f9fa;
            border-color: #f8f9fa
        }

        .btn-light:not([disabled]):not(.disabled).active, .btn-light:not([disabled]):not(.disabled):active, .show > .btn-light.dropdown-toggle {
            color: #111;
            background-color: #dae0e5;
            border-color: #d3d9df;
            box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5)
        }

        .btn-dark {
            color: #fff;
            background-color: #343a40;
            border-color: #343a40
        }

        .btn-dark:hover {
            color: #fff;
            background-color: #23272b;
            border-color: #1d2124
        }

        .btn-dark.focus, .btn-dark:focus {
            box-shadow: 0 0 0 .2rem rgba(52, 58, 64, .5)
        }

        .btn-dark.disabled, .btn-dark:disabled {
            background-color: #343a40;
            border-color: #343a40
        }

        .btn-dark:not([disabled]):not(.disabled).active, .btn-dark:not([disabled]):not(.disabled):active, .show > .btn-dark.dropdown-toggle {
            color: #fff;
            background-color: #1d2124;
            border-color: #171a1d;
            box-shadow: 0 0 0 .2rem rgba(52, 58, 64, .5)
        }

        .btn-outline-primary {
            color: #007bff;
            background-color: transparent;
            background-image: none;
            border-color: #007bff
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff
        }

        .btn-outline-primary.focus, .btn-outline-primary:focus {
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
        }

        .btn-outline-primary.disabled, .btn-outline-primary:disabled {
            color: #007bff;
            background-color: transparent
        }

        .btn-outline-primary:not([disabled]):not(.disabled).active, .btn-outline-primary:not([disabled]):not(.disabled):active, .show > .btn-outline-primary.dropdown-toggle {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
        }

        .btn-outline-secondary {
            color: #868e96;
            background-color: transparent;
            background-image: none;
            border-color: #868e96
        }

        .btn-outline-secondary:hover {
            color: #fff;
            background-color: #868e96;
            border-color: #868e96
        }

        .btn-outline-secondary.focus, .btn-outline-secondary:focus {
            box-shadow: 0 0 0 .2rem rgba(134, 142, 150, .5)
        }

        .btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
            color: #868e96;
            background-color: transparent
        }

        .btn-outline-secondary:not([disabled]):not(.disabled).active, .btn-outline-secondary:not([disabled]):not(.disabled):active, .show > .btn-outline-secondary.dropdown-toggle {
            color: #fff;
            background-color: #868e96;
            border-color: #868e96;
            box-shadow: 0 0 0 .2rem rgba(134, 142, 150, .5)
        }

        .btn-outline-success {
            color: #28a745;
            background-color: transparent;
            background-image: none;
            border-color: #28a745
        }

        .btn-outline-success:hover {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745
        }

        .btn-outline-success.focus, .btn-outline-success:focus {
            box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
        }

        .btn-outline-success.disabled, .btn-outline-success:disabled {
            color: #28a745;
            background-color: transparent
        }

        .btn-outline-success:not([disabled]):not(.disabled).active, .btn-outline-success:not([disabled]):not(.disabled):active, .show > .btn-outline-success.dropdown-toggle {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            box-shadow: 0 0 0 .2rem rgba(40, 167, 69, .5)
        }

        .btn-outline-info {
            color: #17a2b8;
            background-color: transparent;
            background-image: none;
            border-color: #17a2b8
        }

        .btn-outline-info:hover {
            color: #fff;
            background-color: #17a2b8;
            border-color: #17a2b8
        }

        .btn-outline-info.focus, .btn-outline-info:focus {
            box-shadow: 0 0 0 .2rem rgba(23, 162, 184, .5)
        }

        .btn-outline-info.disabled, .btn-outline-info:disabled {
            color: #17a2b8;
            background-color: transparent
        }

        .btn-outline-info:not([disabled]):not(.disabled).active, .btn-outline-info:not([disabled]):not(.disabled):active, .show > .btn-outline-info.dropdown-toggle {
            color: #fff;
            background-color: #17a2b8;
            border-color: #17a2b8;
            box-shadow: 0 0 0 .2rem rgba(23, 162, 184, .5)
        }

        .btn-outline-warning {
            color: #ffc107;
            background-color: transparent;
            background-image: none;
            border-color: #ffc107
        }

        .btn-outline-warning:hover {
            color: #fff;
            background-color: #ffc107;
            border-color: #ffc107
        }

        .btn-outline-warning.focus, .btn-outline-warning:focus {
            box-shadow: 0 0 0 .2rem rgba(255, 193, 7, .5)
        }

        .btn-outline-warning.disabled, .btn-outline-warning:disabled {
            color: #ffc107;
            background-color: transparent
        }

        .btn-outline-warning:not([disabled]):not(.disabled).active, .btn-outline-warning:not([disabled]):not(.disabled):active, .show > .btn-outline-warning.dropdown-toggle {
            color: #fff;
            background-color: #ffc107;
            border-color: #ffc107;
            box-shadow: 0 0 0 .2rem rgba(255, 193, 7, .5)
        }

        .btn-outline-danger {
            color: #dc3545;
            background-color: transparent;
            background-image: none;
            border-color: #dc3545
        }

        .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545
        }

        .btn-outline-danger.focus, .btn-outline-danger:focus {
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .5)
        }

        .btn-outline-danger.disabled, .btn-outline-danger:disabled {
            color: #dc3545;
            background-color: transparent
        }

        .btn-outline-danger:not([disabled]):not(.disabled).active, .btn-outline-danger:not([disabled]):not(.disabled):active, .show > .btn-outline-danger.dropdown-toggle {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
            box-shadow: 0 0 0 .2rem rgba(220, 53, 69, .5)
        }

        .btn-outline-light {
            color: #f8f9fa;
            background-color: transparent;
            background-image: none;
            border-color: #f8f9fa
        }

        .btn-outline-light:hover {
            color: #212529;
            background-color: #f8f9fa;
            border-color: #f8f9fa
        }

        .btn-outline-light.focus, .btn-outline-light:focus {
            box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5)
        }

        .btn-outline-light.disabled, .btn-outline-light:disabled {
            color: #f8f9fa;
            background-color: transparent
        }

        .btn-outline-light:not([disabled]):not(.disabled).active, .btn-outline-light:not([disabled]):not(.disabled):active, .show > .btn-outline-light.dropdown-toggle {
            color: #212529;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
            box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5)
        }

        .btn-outline-dark {
            color: #343a40;
            background-color: transparent;
            background-image: none;
            border-color: #343a40
        }

        .btn-outline-dark:hover {
            color: #fff;
            background-color: #343a40;
            border-color: #343a40
        }

        .btn-outline-dark.focus, .btn-outline-dark:focus {
            box-shadow: 0 0 0 .2rem rgba(52, 58, 64, .5)
        }

        .btn-outline-dark.disabled, .btn-outline-dark:disabled {
            color: #343a40;
            background-color: transparent
        }

        .btn-outline-dark:not([disabled]):not(.disabled).active, .btn-outline-dark:not([disabled]):not(.disabled):active, .show > .btn-outline-dark.dropdown-toggle {
            color: #fff;
            background-color: #343a40;
            border-color: #343a40;
            box-shadow: 0 0 0 .2rem rgba(52, 58, 64, .5)
        }

        .btn-link {
            font-weight: 400;
            color: #007bff;
            background-color: transparent
        }

        .btn-link:hover {
            color: #0056b3;
            text-decoration: underline;
            background-color: transparent;
            border-color: transparent
        }

        .btn-link.focus, .btn-link:focus {
            border-color: transparent;
            box-shadow: none
        }

        .btn-link.disabled, .btn-link:disabled {
            color: #868e96
        }

        .btn-group-lg > .btn, .btn-lg {
            padding: .5rem 1rem;
            font-size: 1.25rem;
            line-height: 1.5;
            border-radius: .3rem
        }

        .btn-group-sm > .btn, .btn-sm {
            padding: .25rem .5rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: .2rem
        }

        .btn-block {
            display: block;
            width: 100%
        }

        .btn-block + .btn-block {
            margin-top: .5rem
        }

        input[type=button].btn-block, input[type=reset].btn-block, input[type=submit].btn-block {
            width: 100%
        }

        .fade {
            opacity: 0;
            transition: opacity .15s linear
        }

        .fade.show {
            opacity: 1
        }

        .collapse {
            display: none
        }

        .collapse.show {
            display: block
        }

        tr.collapse.show {
            display: table-row
        }

        tbody.collapse.show {
            display: table-row-group
        }

        .collapsing {
            position: relative;
            height: 0;
            overflow: hidden;
            transition: height .35s ease
        }

        .dropdown, .dropup {
            position: relative
        }

        .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent
        }

        .dropdown-toggle:empty::after {
            margin-left: 0
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 10rem;
            padding: .5rem 0;
            margin: .125rem 0 0;
            font-size: 1rem;
            color: #212529;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: .25rem
        }

        .dropup .dropdown-menu {
            margin-top: 0;
            margin-bottom: .125rem
        }

        .dropup .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .255em;
            vertical-align: .255em;
            content: "";
            border-top: 0;
            border-right: .3em solid transparent;
            border-bottom: .3em solid;
            border-left: .3em solid transparent
        }

        .dropup .dropdown-toggle:empty::after {
            margin-left: 0
        }

        .dropdown-divider {
            height: 0;
            margin: .5rem 0;
            overflow: hidden;
            border-top: 1px solid #e9ecef
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: .25rem 1.5rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background: 0 0;
            border: 0
        }

        .dropdown-item:focus, .dropdown-item:hover {
            color: #16181b;
            text-decoration: none;
            background-color: #f8f9fa
        }

        .dropdown-item.active, .dropdown-item:active {
            color: #fff;
            text-decoration: none;
            background-color: #007bff
        }

        .dropdown-item.disabled, .dropdown-item:disabled {
            color: #868e96;
            background-color: transparent
        }

        .dropdown-menu.show {
            display: block
        }

        .dropdown-header {
            display: block;
            padding: .5rem 1.5rem;
            margin-bottom: 0;
            font-size: .875rem;
            color: #868e96;
            white-space: nowrap
        }

        .btn-group, .btn-group-vertical {
            position: relative;
            display: -ms-inline-flexbox;
            display: inline-flex;
            vertical-align: middle
        }

        .btn-group-vertical > .btn, .btn-group > .btn {
            position: relative;
            -ms-flex: 0 1 auto;
            flex: 0 1 auto
        }

        .btn-group-vertical > .btn:hover, .btn-group > .btn:hover {
            z-index: 2
        }

        .btn-group-vertical > .btn.active, .btn-group-vertical > .btn:active, .btn-group-vertical > .btn:focus, .btn-group > .btn.active, .btn-group > .btn:active, .btn-group > .btn:focus {
            z-index: 2
        }

        .btn-group .btn + .btn, .btn-group .btn + .btn-group, .btn-group .btn-group + .btn, .btn-group .btn-group + .btn-group, .btn-group-vertical .btn + .btn, .btn-group-vertical .btn + .btn-group, .btn-group-vertical .btn-group + .btn, .btn-group-vertical .btn-group + .btn-group {
            margin-left: -1px
        }

        .btn-toolbar {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: start;
            justify-content: flex-start
        }

        .btn-toolbar .input-group {
            width: auto
        }

        .btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
            border-radius: 0
        }

        .btn-group > .btn:first-child {
            margin-left: 0
        }

        .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .btn-group > .btn:last-child:not(:first-child), .btn-group > .dropdown-toggle:not(:first-child) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .btn-group > .btn-group {
            float: left
        }

        .btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
            border-radius: 0
        }

        .btn-group > .btn-group:first-child:not(:last-child) > .btn:last-child, .btn-group > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .btn-group > .btn-group:last-child:not(:first-child) > .btn:first-child {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .btn + .dropdown-toggle-split {
            padding-right: .5625rem;
            padding-left: .5625rem
        }

        .btn + .dropdown-toggle-split::after {
            margin-left: 0
        }

        .btn-group-sm > .btn + .dropdown-toggle-split, .btn-sm + .dropdown-toggle-split {
            padding-right: .375rem;
            padding-left: .375rem
        }

        .btn-group-lg > .btn + .dropdown-toggle-split, .btn-lg + .dropdown-toggle-split {
            padding-right: .75rem;
            padding-left: .75rem
        }

        .btn-group-vertical {
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-align: start;
            align-items: flex-start;
            -ms-flex-pack: center;
            justify-content: center
        }

        .btn-group-vertical .btn, .btn-group-vertical .btn-group {
            width: 100%
        }

        .btn-group-vertical > .btn + .btn, .btn-group-vertical > .btn + .btn-group, .btn-group-vertical > .btn-group + .btn, .btn-group-vertical > .btn-group + .btn-group {
            margin-top: -1px;
            margin-left: 0
        }

        .btn-group-vertical > .btn:not(:first-child):not(:last-child) {
            border-radius: 0
        }

        .btn-group-vertical > .btn:first-child:not(:last-child) {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0
        }

        .btn-group-vertical > .btn:last-child:not(:first-child) {
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {
            border-radius: 0
        }

        .btn-group-vertical > .btn-group:first-child:not(:last-child) > .btn:last-child, .btn-group-vertical > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0
        }

        .btn-group-vertical > .btn-group:last-child:not(:first-child) > .btn:first-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        [data-toggle=buttons] > .btn input[type=checkbox], [data-toggle=buttons] > .btn input[type=radio], [data-toggle=buttons] > .btn-group > .btn input[type=checkbox], [data-toggle=buttons] > .btn-group > .btn input[type=radio] {
            position: absolute;
            clip: rect(0, 0, 0, 0);
            pointer-events: none
        }

        .input-group {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: stretch;
            align-items: stretch;
            width: 100%
        }

        .input-group .form-control {
            position: relative;
            z-index: 2;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            width: 1%;
            margin-bottom: 0
        }

        .input-group .form-control:active, .input-group .form-control:focus, .input-group .form-control:hover {
            z-index: 3
        }

        .input-group .form-control, .input-group-addon, .input-group-btn {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center
        }

        .input-group .form-control:not(:first-child):not(:last-child), .input-group-addon:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child) {
            border-radius: 0
        }

        .input-group-addon, .input-group-btn {
            white-space: nowrap
        }

        .input-group-addon {
            padding: .375rem .75rem;
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            text-align: center;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: .25rem
        }

        .input-group-addon.form-control-sm, .input-group-sm > .input-group-addon, .input-group-sm > .input-group-btn > .input-group-addon.btn {
            padding: .25rem .5rem;
            font-size: .875rem;
            border-radius: .2rem
        }

        .input-group-addon.form-control-lg, .input-group-lg > .input-group-addon, .input-group-lg > .input-group-btn > .input-group-addon.btn {
            padding: .5rem 1rem;
            font-size: 1.25rem;
            border-radius: .3rem
        }

        .input-group-addon input[type=checkbox], .input-group-addon input[type=radio] {
            margin-top: 0
        }

        .input-group .form-control:not(:last-child), .input-group-addon:not(:last-child), .input-group-btn:not(:first-child) > .btn-group:not(:last-child) > .btn, .input-group-btn:not(:first-child) > .btn:not(:last-child):not(.dropdown-toggle), .input-group-btn:not(:last-child) > .btn, .input-group-btn:not(:last-child) > .btn-group > .btn, .input-group-btn:not(:last-child) > .dropdown-toggle {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .input-group-addon:not(:last-child) {
            border-right: 0
        }

        .input-group .form-control:not(:first-child), .input-group-addon:not(:first-child), .input-group-btn:not(:first-child) > .btn, .input-group-btn:not(:first-child) > .btn-group > .btn, .input-group-btn:not(:first-child) > .dropdown-toggle, .input-group-btn:not(:last-child) > .btn-group:not(:first-child) > .btn, .input-group-btn:not(:last-child) > .btn:not(:first-child) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }

        .form-control + .input-group-addon:not(:first-child) {
            border-left: 0
        }

        .input-group-btn {
            position: relative;
            -ms-flex-align: stretch;
            align-items: stretch;
            font-size: 0;
            white-space: nowrap
        }

        .input-group-btn > .btn {
            position: relative
        }

        .input-group-btn > .btn + .btn {
            margin-left: -1px
        }

        .input-group-btn > .btn:active, .input-group-btn > .btn:focus, .input-group-btn > .btn:hover {
            z-index: 3
        }

        .input-group-btn:first-child > .btn + .btn {
            margin-left: 0
        }

        .input-group-btn:not(:last-child) > .btn, .input-group-btn:not(:last-child) > .btn-group {
            margin-right: -1px
        }

        .input-group-btn:not(:first-child) > .btn, .input-group-btn:not(:first-child) > .btn-group {
            z-index: 2;
            margin-left: 0
        }

        .input-group-btn:not(:first-child) > .btn-group:first-child, .input-group-btn:not(:first-child) > .btn:first-child {
            margin-left: -1px
        }

        .input-group-btn:not(:first-child) > .btn-group:active, .input-group-btn:not(:first-child) > .btn-group:focus, .input-group-btn:not(:first-child) > .btn-group:hover, .input-group-btn:not(:first-child) > .btn:active, .input-group-btn:not(:first-child) > .btn:focus, .input-group-btn:not(:first-child) > .btn:hover {
            z-index: 3
        }

        .custom-control {
            position: relative;
            display: -ms-inline-flexbox;
            display: inline-flex;
            min-height: 1.5rem;
            padding-left: 1.5rem;
            margin-right: 1rem
        }

        .custom-control-input {
            position: absolute;
            z-index: -1;
            opacity: 0
        }

        .custom-control-input:checked ~ .custom-control-indicator {
            color: #fff;
            background-color: #007bff
        }

        .custom-control-input:focus ~ .custom-control-indicator {
            box-shadow: 0 0 0 1px #fff, 0 0 0 .2rem rgba(0, 123, 255, .25)
        }

        .custom-control-input:active ~ .custom-control-indicator {
            color: #fff;
            background-color: #b3d7ff
        }

        .custom-control-input:disabled ~ .custom-control-indicator {
            background-color: #e9ecef
        }

        .custom-control-input:disabled ~ .custom-control-description {
            color: #868e96
        }

        .custom-control-indicator {
            position: absolute;
            top: .25rem;
            left: 0;
            display: block;
            width: 1rem;
            height: 1rem;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: #ddd;
            background-repeat: no-repeat;
            background-position: center center;
            background-size: 50% 50%
        }

        .custom-checkbox .custom-control-indicator {
            border-radius: .25rem
        }

        .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3E%3C/svg%3E")
        }

        .custom-checkbox .custom-control-input:indeterminate ~ .custom-control-indicator {
            background-color: #007bff;
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 4'%3E%3Cpath stroke='%23fff' d='M0 2h4'/%3E%3C/svg%3E")
        }

        .custom-radio .custom-control-indicator {
            border-radius: 50%
        }

        .custom-radio .custom-control-input:checked ~ .custom-control-indicator {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3E%3Ccircle r='3' fill='%23fff'/%3E%3C/svg%3E")
        }

        .custom-controls-stacked {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column
        }

        .custom-controls-stacked .custom-control {
            margin-bottom: .25rem
        }

        .custom-controls-stacked .custom-control + .custom-control {
            margin-left: 0
        }

        .custom-select {
            display: inline-block;
            max-width: 100%;
            height: calc(2.25rem + 2px);
            padding: .375rem 1.75rem .375rem .75rem;
            line-height: 1.5;
            color: #495057;
            vertical-align: middle;
            background: #fff url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23333' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right .75rem center;
            background-size: 8px 10px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }

        .custom-select:focus {
            border-color: #80bdff;
            outline: 0
        }

        .custom-select:focus::-ms-value {
            color: #495057;
            background-color: #fff
        }

        .custom-select[multiple] {
            height: auto;
            background-image: none
        }

        .custom-select:disabled {
            color: #868e96;
            background-color: #e9ecef
        }

        .custom-select::-ms-expand {
            opacity: 0
        }

        .custom-select-sm {
            height: calc(1.8125rem + 2px);
            padding-top: .375rem;
            padding-bottom: .375rem;
            font-size: 75%
        }

        .custom-file {
            position: relative;
            display: inline-block;
            max-width: 100%;
            height: calc(2.25rem + 2px);
            margin-bottom: 0
        }

        .custom-file-input {
            min-width: 14rem;
            max-width: 100%;
            height: calc(2.25rem + 2px);
            margin: 0;
            opacity: 0
        }

        .custom-file-input:focus ~ .custom-file-control {
            box-shadow: 0 0 0 .075rem #fff, 0 0 0 .2rem #007bff
        }

        .custom-file-control {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 5;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            line-height: 1.5;
            color: #495057;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem
        }

        .custom-file-control:lang(en):empty::after {
            content: "Choose file..."
        }

        .custom-file-control::before {
            position: absolute;
            top: -1px;
            right: -1px;
            bottom: -1px;
            z-index: 6;
            display: block;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            line-height: 1.5;
            color: #495057;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 0 .25rem .25rem 0
        }

        .custom-file-control:lang(en)::before {
            content: "Browse"
        }

        .nav {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none
        }

        .nav-link {
            display: block;
            padding: .5rem 1rem
        }

        .nav-link:focus, .nav-link:hover {
            text-decoration: none
        }

        .nav-link.disabled {
            color: #868e96
        }

        .nav-tabs {
            border-bottom: 1px solid #ddd
        }

        .nav-tabs .nav-item {
            margin-bottom: -1px
        }

        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem
        }

        .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
            border-color: #e9ecef #e9ecef #ddd
        }

        .nav-tabs .nav-link.disabled {
            color: #868e96;
            background-color: transparent;
            border-color: transparent
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #fff;
            border-color: #ddd #ddd #fff
        }

        .nav-tabs .dropdown-menu {
            margin-top: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .nav-pills .nav-link {
            border-radius: .25rem
        }

        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #007bff
        }

        .nav-fill .nav-item {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            text-align: center
        }

        .nav-justified .nav-item {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            text-align: center
        }

        .tab-content > .tab-pane {
            display: none
        }

        .tab-content > .active {
            display: block
        }

        .navbar {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: .5rem 1rem
        }

        .navbar > .container, .navbar > .container-fluid {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: justify;
            justify-content: space-between
        }

        .navbar-brand {
            display: inline-block;
            padding-top: .3125rem;
            padding-bottom: .3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            line-height: inherit;
            white-space: nowrap
        }

        .navbar-brand:focus, .navbar-brand:hover {
            text-decoration: none
        }

        .navbar-nav {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none
        }

        .navbar-nav .nav-link {
            padding-right: 0;
            padding-left: 0
        }

        .navbar-nav .dropdown-menu {
            position: static;
            float: none
        }

        .navbar-text {
            display: inline-block;
            padding-top: .5rem;
            padding-bottom: .5rem
        }

        .navbar-collapse {
            -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-align: center;
            align-items: center
        }

        .navbar-toggler {
            padding: .25rem .75rem;
            font-size: 1.25rem;
            line-height: 1;
            background: 0 0;
            border: 1px solid transparent;
            border-radius: .25rem
        }

        .navbar-toggler:focus, .navbar-toggler:hover {
            text-decoration: none
        }

        .navbar-toggler-icon {
            display: inline-block;
            width: 1.5em;
            height: 1.5em;
            vertical-align: middle;
            content: "";
            background: no-repeat center center;
            background-size: 100% 100%
        }

        @media (max-width: 575px) {
            .navbar-expand-sm > .container, .navbar-expand-sm > .container-fluid {
                padding-right: 0;
                padding-left: 0
            }
        }

        @media (min-width: 576px) {
            .navbar-expand-sm {
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
                -ms-flex-pack: start;
                justify-content: flex-start
            }

            .navbar-expand-sm .navbar-nav {
                -ms-flex-direction: row;
                flex-direction: row
            }

            .navbar-expand-sm .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-sm .navbar-nav .dropdown-menu-right {
                right: 0;
                left: auto
            }

            .navbar-expand-sm .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem
            }

            .navbar-expand-sm > .container, .navbar-expand-sm > .container-fluid {
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap
            }

            .navbar-expand-sm .navbar-collapse {
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto
            }

            .navbar-expand-sm .navbar-toggler {
                display: none
            }

            .navbar-expand-sm .dropup .dropdown-menu {
                top: auto;
                bottom: 100%
            }
        }

        @media (max-width: 767px) {
            .navbar-expand-md > .container, .navbar-expand-md > .container-fluid {
                padding-right: 0;
                padding-left: 0
            }
        }

        @media (min-width: 768px) {
            .navbar-expand-md {
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
                -ms-flex-pack: start;
                justify-content: flex-start
            }

            .navbar-expand-md .navbar-nav {
                -ms-flex-direction: row;
                flex-direction: row
            }

            .navbar-expand-md .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-md .navbar-nav .dropdown-menu-right {
                right: 0;
                left: auto
            }

            .navbar-expand-md .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem
            }

            .navbar-expand-md > .container, .navbar-expand-md > .container-fluid {
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap
            }

            .navbar-expand-md .navbar-collapse {
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto
            }

            .navbar-expand-md .navbar-toggler {
                display: none
            }

            .navbar-expand-md .dropup .dropdown-menu {
                top: auto;
                bottom: 100%
            }
        }

        @media (max-width: 991px) {
            .navbar-expand-lg > .container, .navbar-expand-lg > .container-fluid {
                padding-right: 0;
                padding-left: 0
            }
        }

        @media (min-width: 992px) {
            .navbar-expand-lg {
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
                -ms-flex-pack: start;
                justify-content: flex-start
            }

            .navbar-expand-lg .navbar-nav {
                -ms-flex-direction: row;
                flex-direction: row
            }

            .navbar-expand-lg .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-lg .navbar-nav .dropdown-menu-right {
                right: 0;
                left: auto
            }

            .navbar-expand-lg .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem
            }

            .navbar-expand-lg > .container, .navbar-expand-lg > .container-fluid {
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap
            }

            .navbar-expand-lg .navbar-collapse {
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto
            }

            .navbar-expand-lg .navbar-toggler {
                display: none
            }

            .navbar-expand-lg .dropup .dropdown-menu {
                top: auto;
                bottom: 100%
            }
        }

        @media (max-width: 1199px) {
            .navbar-expand-xl > .container, .navbar-expand-xl > .container-fluid {
                padding-right: 0;
                padding-left: 0
            }
        }

        @media (min-width: 1200px) {
            .navbar-expand-xl {
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
                -ms-flex-pack: start;
                justify-content: flex-start
            }

            .navbar-expand-xl .navbar-nav {
                -ms-flex-direction: row;
                flex-direction: row
            }

            .navbar-expand-xl .navbar-nav .dropdown-menu {
                position: absolute
            }

            .navbar-expand-xl .navbar-nav .dropdown-menu-right {
                right: 0;
                left: auto
            }

            .navbar-expand-xl .navbar-nav .nav-link {
                padding-right: .5rem;
                padding-left: .5rem
            }

            .navbar-expand-xl > .container, .navbar-expand-xl > .container-fluid {
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap
            }

            .navbar-expand-xl .navbar-collapse {
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex-preferred-size: auto;
                flex-basis: auto
            }

            .navbar-expand-xl .navbar-toggler {
                display: none
            }

            .navbar-expand-xl .dropup .dropdown-menu {
                top: auto;
                bottom: 100%
            }
        }

        .navbar-expand {
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -ms-flex-pack: start;
            justify-content: flex-start
        }

        .navbar-expand > .container, .navbar-expand > .container-fluid {
            padding-right: 0;
            padding-left: 0
        }

        .navbar-expand .navbar-nav {
            -ms-flex-direction: row;
            flex-direction: row
        }

        .navbar-expand .navbar-nav .dropdown-menu {
            position: absolute
        }

        .navbar-expand .navbar-nav .dropdown-menu-right {
            right: 0;
            left: auto
        }

        .navbar-expand .navbar-nav .nav-link {
            padding-right: .5rem;
            padding-left: .5rem
        }

        .navbar-expand > .container, .navbar-expand > .container-fluid {
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap
        }

        .navbar-expand .navbar-collapse {
            display: -ms-flexbox !important;
            display: flex !important;
            -ms-flex-preferred-size: auto;
            flex-basis: auto
        }

        .navbar-expand .navbar-toggler {
            display: none
        }

        .navbar-expand .dropup .dropdown-menu {
            top: auto;
            bottom: 100%
        }

        .navbar-light .navbar-brand {
            color: rgba(0, 0, 0, .9)
        }

        .navbar-light .navbar-brand:focus, .navbar-light .navbar-brand:hover {
            color: rgba(0, 0, 0, .9)
        }

        .navbar-light .navbar-nav .nav-link {
            color: rgba(0, 0, 0, .5)
        }

        .navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
            color: rgba(0, 0, 0, .7)
        }

        .navbar-light .navbar-nav .nav-link.disabled {
            color: rgba(0, 0, 0, .3)
        }

        .navbar-light .navbar-nav .active > .nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show > .nav-link {
            color: rgba(0, 0, 0, .9)
        }

        .navbar-light .navbar-toggler {
            color: rgba(0, 0, 0, .5);
            border-color: rgba(0, 0, 0, .1)
        }

        .navbar-light .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")
        }

        .navbar-light .navbar-text {
            color: rgba(0, 0, 0, .5)
        }

        .navbar-light .navbar-text a {
            color: rgba(0, 0, 0, .9)
        }

        .navbar-light .navbar-text a:focus, .navbar-light .navbar-text a:hover {
            color: rgba(0, 0, 0, .9)
        }

        .navbar-dark .navbar-brand {
            color: #fff
        }

        .navbar-dark .navbar-brand:focus, .navbar-dark .navbar-brand:hover {
            color: #fff
        }

        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, .5)
        }

        .navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover {
            color: rgba(255, 255, 255, .75)
        }

        .navbar-dark .navbar-nav .nav-link.disabled {
            color: rgba(255, 255, 255, .25)
        }

        .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show > .nav-link {
            color: #fff
        }

        .navbar-dark .navbar-toggler {
            color: rgba(255, 255, 255, .5);
            border-color: rgba(255, 255, 255, .1)
        }

        .navbar-dark .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")
        }

        .navbar-dark .navbar-text {
            color: rgba(255, 255, 255, .5)
        }

        .navbar-dark .navbar-text a {
            color: #fff
        }

        .navbar-dark .navbar-text a:focus, .navbar-dark .navbar-text a:hover {
            color: #fff
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem
        }

        .card > hr {
            margin-right: 0;
            margin-left: 0
        }

        .card > .list-group:first-child .list-group-item:first-child {
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem
        }

        .card > .list-group:last-child .list-group-item:last-child {
            border-bottom-right-radius: .25rem;
            border-bottom-left-radius: .25rem
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .card-title {
            margin-bottom: .75rem
        }

        .card-subtitle {
            margin-top: -.375rem;
            margin-bottom: 0
        }

        .card-text:last-child {
            margin-bottom: 0
        }

        .card-link:hover {
            text-decoration: none
        }

        .card-link + .card-link {
            margin-left: 1.25rem
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125)
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        .card-header + .list-group .list-group-item:first-child {
            border-top: 0
        }

        .card-footer {
            padding: .75rem 1.25rem;
            background-color: rgba(0, 0, 0, .03);
            border-top: 1px solid rgba(0, 0, 0, .125)
        }

        .card-footer:last-child {
            border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px)
        }

        .card-header-tabs {
            margin-right: -.625rem;
            margin-bottom: -.75rem;
            margin-left: -.625rem;
            border-bottom: 0
        }

        .card-header-pills {
            margin-right: -.625rem;
            margin-left: -.625rem
        }

        .card-img-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1.25rem
        }

        .card-img {
            width: 100%;
            border-radius: calc(.25rem - 1px)
        }

        .card-img-top {
            width: 100%;
            border-top-left-radius: calc(.25rem - 1px);
            border-top-right-radius: calc(.25rem - 1px)
        }

        .card-img-bottom {
            width: 100%;
            border-bottom-right-radius: calc(.25rem - 1px);
            border-bottom-left-radius: calc(.25rem - 1px)
        }

        .card-deck {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column
        }

        .card-deck .card {
            margin-bottom: 15px
        }

        @media (min-width: 576px) {
            .card-deck {
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
                margin-right: -15px;
                margin-left: -15px
            }

            .card-deck .card {
                display: -ms-flexbox;
                display: flex;
                -ms-flex: 1 0 0%;
                flex: 1 0 0%;
                -ms-flex-direction: column;
                flex-direction: column;
                margin-right: 15px;
                margin-bottom: 0;
                margin-left: 15px
            }
        }

        .card-group {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column
        }

        .card-group .card {
            margin-bottom: 15px
        }

        @media (min-width: 576px) {
            .card-group {
                -ms-flex-flow: row wrap;
                flex-flow: row wrap
            }

            .card-group .card {
                -ms-flex: 1 0 0%;
                flex: 1 0 0%;
                margin-bottom: 0
            }

            .card-group .card + .card {
                margin-left: 0;
                border-left: 0
            }

            .card-group .card:first-child {
                border-top-right-radius: 0;
                border-bottom-right-radius: 0
            }

            .card-group .card:first-child .card-img-top {
                border-top-right-radius: 0
            }

            .card-group .card:first-child .card-img-bottom {
                border-bottom-right-radius: 0
            }

            .card-group .card:last-child {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0
            }

            .card-group .card:last-child .card-img-top {
                border-top-left-radius: 0
            }

            .card-group .card:last-child .card-img-bottom {
                border-bottom-left-radius: 0
            }

            .card-group .card:only-child {
                border-radius: .25rem
            }

            .card-group .card:only-child .card-img-top {
                border-top-left-radius: .25rem;
                border-top-right-radius: .25rem
            }

            .card-group .card:only-child .card-img-bottom {
                border-bottom-right-radius: .25rem;
                border-bottom-left-radius: .25rem
            }

            .card-group .card:not(:first-child):not(:last-child):not(:only-child) {
                border-radius: 0
            }

            .card-group .card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom, .card-group .card:not(:first-child):not(:last-child):not(:only-child) .card-img-top {
                border-radius: 0
            }
        }

        .card-columns .card {
            margin-bottom: .75rem
        }

        @media (min-width: 576px) {
            .card-columns {
                -webkit-column-count: 3;
                column-count: 3;
                -webkit-column-gap: 1.25rem;
                column-gap: 1.25rem
            }

            .card-columns .card {
                display: inline-block;
                width: 100%
            }
        }

        .breadcrumb {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: .75rem 1rem;
            margin-bottom: 1rem;
            list-style: none;
            background-color: #e9ecef;
            border-radius: .25rem
        }

        .breadcrumb-item + .breadcrumb-item::before {
            display: inline-block;
            padding-right: .5rem;
            padding-left: .5rem;
            color: #868e96;
            content: "/"
        }

        .breadcrumb-item + .breadcrumb-item:hover::before {
            text-decoration: underline
        }

        .breadcrumb-item + .breadcrumb-item:hover::before {
            text-decoration: none
        }

        .breadcrumb-item.active {
            color: #868e96
        }

        .pagination {
            display: -ms-flexbox;
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: .25rem
        }

        .page-item:first-child .page-link {
            margin-left: 0;
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem
        }

        .page-item:last-child .page-link {
            border-top-right-radius: .25rem;
            border-bottom-right-radius: .25rem
        }

        .page-item.active .page-link {
            z-index: 2;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff
        }

        .page-item.disabled .page-link {
            color: #868e96;
            pointer-events: none;
            background-color: #fff;
            border-color: #ddd
        }

        .page-link {
            position: relative;
            display: block;
            padding: .5rem .75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #ddd
        }

        .page-link:focus, .page-link:hover {
            color: #0056b3;
            text-decoration: none;
            background-color: #e9ecef;
            border-color: #ddd
        }

        .pagination-lg .page-link {
            padding: .75rem 1.5rem;
            font-size: 1.25rem;
            line-height: 1.5
        }

        .pagination-lg .page-item:first-child .page-link {
            border-top-left-radius: .3rem;
            border-bottom-left-radius: .3rem
        }

        .pagination-lg .page-item:last-child .page-link {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem
        }

        .pagination-sm .page-link {
            padding: .25rem .5rem;
            font-size: .875rem;
            line-height: 1.5
        }

        .pagination-sm .page-item:first-child .page-link {
            border-top-left-radius: .2rem;
            border-bottom-left-radius: .2rem
        }

        .pagination-sm .page-item:last-child .page-link {
            border-top-right-radius: .2rem;
            border-bottom-right-radius: .2rem
        }

        .badge {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem
        }

        .badge:empty {
            display: none
        }

        .btn .badge {
            position: relative;
            top: -1px
        }

        .badge-pill {
            padding-right: .6em;
            padding-left: .6em;
            border-radius: 10rem
        }

        .badge-primary {
            color: #fff;
            background-color: #007bff
        }

        .badge-primary[href]:focus, .badge-primary[href]:hover {
            color: #fff;
            text-decoration: none;
            background-color: #0062cc
        }

        .badge-secondary {
            color: #fff;
            background-color: #868e96
        }

        .badge-secondary[href]:focus, .badge-secondary[href]:hover {
            color: #fff;
            text-decoration: none;
            background-color: #6c757d
        }

        .badge-success {
            color: #fff;
            background-color: #28a745
        }

        .badge-success[href]:focus, .badge-success[href]:hover {
            color: #fff;
            text-decoration: none;
            background-color: #1e7e34
        }

        .badge-info {
            color: #fff;
            background-color: #17a2b8
        }

        .badge-info[href]:focus, .badge-info[href]:hover {
            color: #fff;
            text-decoration: none;
            background-color: #117a8b
        }

        .badge-warning {
            color: #111;
            background-color: #ffc107
        }

        .badge-warning[href]:focus, .badge-warning[href]:hover {
            color: #111;
            text-decoration: none;
            background-color: #d39e00
        }

        .badge-danger {
            color: #fff;
            background-color: #dc3545
        }

        .badge-danger[href]:focus, .badge-danger[href]:hover {
            color: #fff;
            text-decoration: none;
            background-color: #bd2130
        }

        .badge-light {
            color: #111;
            background-color: #f8f9fa
        }

        .badge-light[href]:focus, .badge-light[href]:hover {
            color: #111;
            text-decoration: none;
            background-color: #dae0e5
        }

        .badge-dark {
            color: #fff;
            background-color: #343a40
        }

        .badge-dark[href]:focus, .badge-dark[href]:hover {
            color: #fff;
            text-decoration: none;
            background-color: #1d2124
        }

        .jumbotron {
            padding: 2rem 1rem;
            margin-bottom: 2rem;
            background-color: #e9ecef;
            border-radius: .3rem
        }

        @media (min-width: 576px) {
            .jumbotron {
                padding: 4rem 2rem
            }
        }

        .jumbotron-fluid {
            padding-right: 0;
            padding-left: 0;
            border-radius: 0
        }

        .alert {
            position: relative;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem
        }

        .alert-heading {
            color: inherit
        }

        .alert-link {
            font-weight: 700
        }

        .alert-dismissible .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: .75rem 1.25rem;
            color: inherit
        }

        .alert-primary {
            color: #004085;
            background-color: #cce5ff;
            border-color: #b8daff
        }

        .alert-primary hr {
            border-top-color: #9fcdff
        }

        .alert-primary .alert-link {
            color: #002752
        }

        .alert-secondary {
            color: #464a4e;
            background-color: #e7e8ea;
            border-color: #dddfe2
        }

        .alert-secondary hr {
            border-top-color: #cfd2d6
        }

        .alert-secondary .alert-link {
            color: #2e3133
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb
        }

        .alert-success hr {
            border-top-color: #b1dfbb
        }

        .alert-success .alert-link {
            color: #0b2e13
        }

        .alert-info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb
        }

        .alert-info hr {
            border-top-color: #abdde5
        }

        .alert-info .alert-link {
            color: #062c33
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba
        }

        .alert-warning hr {
            border-top-color: #ffe8a1
        }

        .alert-warning .alert-link {
            color: #533f03
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb
        }

        .alert-danger hr {
            border-top-color: #f1b0b7
        }

        .alert-danger .alert-link {
            color: #491217
        }

        .alert-light {
            color: #818182;
            background-color: #fefefe;
            border-color: #fdfdfe
        }

        .alert-light hr {
            border-top-color: #ececf6
        }

        .alert-light .alert-link {
            color: #686868
        }

        .alert-dark {
            color: #1b1e21;
            background-color: #d6d8d9;
            border-color: #c6c8ca
        }

        .alert-dark hr {
            border-top-color: #b9bbbe
        }

        .alert-dark .alert-link {
            color: #040505
        }

        @-webkit-keyframes progress-bar-stripes {
            from {
                background-position: 1rem 0
            }
            to {
                background-position: 0 0
            }
        }

        @keyframes progress-bar-stripes {
            from {
                background-position: 1rem 0
            }
            to {
                background-position: 0 0
            }
        }

        .progress {
            display: -ms-flexbox;
            display: flex;
            height: 1rem;
            overflow: hidden;
            font-size: .75rem;
            background-color: #e9ecef;
            border-radius: .25rem
        }

        .progress-bar {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            color: #fff;
            background-color: #007bff
        }

        .progress-bar-striped {
            background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
            background-size: 1rem 1rem
        }

        .progress-bar-animated {
            -webkit-animation: progress-bar-stripes 1s linear infinite;
            animation: progress-bar-stripes 1s linear infinite
        }

        .media {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start
        }

        .media-body {
            -ms-flex: 1;
            flex: 1
        }

        .list-group {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            padding-left: 0;
            margin-bottom: 0
        }

        .list-group-item-action {
            width: 100%;
            color: #495057;
            text-align: inherit
        }

        .list-group-item-action:focus, .list-group-item-action:hover {
            color: #495057;
            text-decoration: none;
            background-color: #f8f9fa
        }

        .list-group-item-action:active {
            color: #212529;
            background-color: #e9ecef
        }

        .list-group-item {
            position: relative;
            display: block;
            padding: .75rem 1.25rem;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, .125)
        }

        .list-group-item:first-child {
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem
        }

        .list-group-item:last-child {
            margin-bottom: 0;
            border-bottom-right-radius: .25rem;
            border-bottom-left-radius: .25rem
        }

        .list-group-item:focus, .list-group-item:hover {
            text-decoration: none
        }

        .list-group-item.disabled, .list-group-item:disabled {
            color: #868e96;
            background-color: #fff
        }

        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff
        }

        .list-group-flush .list-group-item {
            border-right: 0;
            border-left: 0;
            border-radius: 0
        }

        .list-group-flush:first-child .list-group-item:first-child {
            border-top: 0
        }

        .list-group-flush:last-child .list-group-item:last-child {
            border-bottom: 0
        }

        .list-group-item-primary {
            color: #004085;
            background-color: #b8daff
        }

        a.list-group-item-primary, button.list-group-item-primary {
            color: #004085
        }

        a.list-group-item-primary:focus, a.list-group-item-primary:hover, button.list-group-item-primary:focus, button.list-group-item-primary:hover {
            color: #004085;
            background-color: #9fcdff
        }

        a.list-group-item-primary.active, button.list-group-item-primary.active {
            color: #fff;
            background-color: #004085;
            border-color: #004085
        }

        .list-group-item-secondary {
            color: #464a4e;
            background-color: #dddfe2
        }

        a.list-group-item-secondary, button.list-group-item-secondary {
            color: #464a4e
        }

        a.list-group-item-secondary:focus, a.list-group-item-secondary:hover, button.list-group-item-secondary:focus, button.list-group-item-secondary:hover {
            color: #464a4e;
            background-color: #cfd2d6
        }

        a.list-group-item-secondary.active, button.list-group-item-secondary.active {
            color: #fff;
            background-color: #464a4e;
            border-color: #464a4e
        }

        .list-group-item-success {
            color: #155724;
            background-color: #c3e6cb
        }

        a.list-group-item-success, button.list-group-item-success {
            color: #155724
        }

        a.list-group-item-success:focus, a.list-group-item-success:hover, button.list-group-item-success:focus, button.list-group-item-success:hover {
            color: #155724;
            background-color: #b1dfbb
        }

        a.list-group-item-success.active, button.list-group-item-success.active {
            color: #fff;
            background-color: #155724;
            border-color: #155724
        }

        .list-group-item-info {
            color: #0c5460;
            background-color: #bee5eb
        }

        a.list-group-item-info, button.list-group-item-info {
            color: #0c5460
        }

        a.list-group-item-info:focus, a.list-group-item-info:hover, button.list-group-item-info:focus, button.list-group-item-info:hover {
            color: #0c5460;
            background-color: #abdde5
        }

        a.list-group-item-info.active, button.list-group-item-info.active {
            color: #fff;
            background-color: #0c5460;
            border-color: #0c5460
        }

        .list-group-item-warning {
            color: #856404;
            background-color: #ffeeba
        }

        a.list-group-item-warning, button.list-group-item-warning {
            color: #856404
        }

        a.list-group-item-warning:focus, a.list-group-item-warning:hover, button.list-group-item-warning:focus, button.list-group-item-warning:hover {
            color: #856404;
            background-color: #ffe8a1
        }

        a.list-group-item-warning.active, button.list-group-item-warning.active {
            color: #fff;
            background-color: #856404;
            border-color: #856404
        }

        .list-group-item-danger {
            color: #721c24;
            background-color: #f5c6cb
        }

        a.list-group-item-danger, button.list-group-item-danger {
            color: #721c24
        }

        a.list-group-item-danger:focus, a.list-group-item-danger:hover, button.list-group-item-danger:focus, button.list-group-item-danger:hover {
            color: #721c24;
            background-color: #f1b0b7
        }

        a.list-group-item-danger.active, button.list-group-item-danger.active {
            color: #fff;
            background-color: #721c24;
            border-color: #721c24
        }

        .list-group-item-light {
            color: #818182;
            background-color: #fdfdfe
        }

        a.list-group-item-light, button.list-group-item-light {
            color: #818182
        }

        a.list-group-item-light:focus, a.list-group-item-light:hover, button.list-group-item-light:focus, button.list-group-item-light:hover {
            color: #818182;
            background-color: #ececf6
        }

        a.list-group-item-light.active, button.list-group-item-light.active {
            color: #fff;
            background-color: #818182;
            border-color: #818182
        }

        .list-group-item-dark {
            color: #1b1e21;
            background-color: #c6c8ca
        }

        a.list-group-item-dark, button.list-group-item-dark {
            color: #1b1e21
        }

        a.list-group-item-dark:focus, a.list-group-item-dark:hover, button.list-group-item-dark:focus, button.list-group-item-dark:hover {
            color: #1b1e21;
            background-color: #b9bbbe
        }

        a.list-group-item-dark.active, button.list-group-item-dark.active {
            color: #fff;
            background-color: #1b1e21;
            border-color: #1b1e21
        }

        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5
        }

        .close:focus, .close:hover {
            color: #000;
            text-decoration: none;
            opacity: .75
        }

        button.close {
            padding: 0;
            background: 0 0;
            border: 0;
            -webkit-appearance: none
        }

        .modal-open {
            overflow: hidden
        }

        .modal {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            display: none;
            overflow: hidden;
            outline: 0
        }

        .modal.fade .modal-dialog {
            transition: -webkit-transform .3s ease-out;
            transition: transform .3s ease-out;
            transition: transform .3s ease-out, -webkit-transform .3s ease-out;
            -webkit-transform: translate(0, -25%);
            transform: translate(0, -25%)
        }

        .modal.show .modal-dialog {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0)
        }

        .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: 10px;
            pointer-events: none
        }

        .modal-content {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: .3rem;
            outline: 0
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #000
        }

        .modal-backdrop.fade {
            opacity: 0
        }

        .modal-backdrop.show {
            opacity: .5
        }

        .modal-header {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            border-top-left-radius: .3rem;
            border-top-right-radius: .3rem
        }

        .modal-header .close {
            padding: 15px;
            margin: -15px -15px -15px auto
        }

        .modal-title {
            margin-bottom: 0;
            line-height: 1.5
        }

        .modal-body {
            position: relative;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 15px
        }

        .modal-footer {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: end;
            justify-content: flex-end;
            padding: 15px;
            border-top: 1px solid #e9ecef
        }

        .modal-footer > :not(:first-child) {
            margin-left: .25rem
        }

        .modal-footer > :not(:last-child) {
            margin-right: .25rem
        }

        .modal-scrollbar-measure {
            position: absolute;
            top: -9999px;
            width: 50px;
            height: 50px;
            overflow: scroll
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 500px;
                margin: 30px auto
            }

            .modal-sm {
                max-width: 300px
            }
        }

        @media (min-width: 992px) {
            .modal-lg {
                max-width: 800px
            }
        }

        .tooltip {
            position: absolute;
            z-index: 1070;
            display: block;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-style: normal;
            font-weight: 400;
            line-height: 1.5;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            white-space: normal;
            line-break: auto;
            font-size: .875rem;
            word-wrap: break-word;
            opacity: 0
        }

        .tooltip.show {
            opacity: .9
        }

        .tooltip .arrow {
            position: absolute;
            display: block;
            width: 5px;
            height: 5px
        }

        .tooltip .arrow::before {
            position: absolute;
            border-color: transparent;
            border-style: solid
        }

        .tooltip.bs-tooltip-auto[x-placement^=top], .tooltip.bs-tooltip-top {
            padding: 5px 0
        }

        .tooltip.bs-tooltip-auto[x-placement^=top] .arrow, .tooltip.bs-tooltip-top .arrow {
            bottom: 0
        }

        .tooltip.bs-tooltip-auto[x-placement^=top] .arrow::before, .tooltip.bs-tooltip-top .arrow::before {
            margin-left: -3px;
            content: "";
            border-width: 5px 5px 0;
            border-top-color: #000
        }

        .tooltip.bs-tooltip-auto[x-placement^=right], .tooltip.bs-tooltip-right {
            padding: 0 5px
        }

        .tooltip.bs-tooltip-auto[x-placement^=right] .arrow, .tooltip.bs-tooltip-right .arrow {
            left: 0
        }

        .tooltip.bs-tooltip-auto[x-placement^=right] .arrow::before, .tooltip.bs-tooltip-right .arrow::before {
            margin-top: -3px;
            content: "";
            border-width: 5px 5px 5px 0;
            border-right-color: #000
        }

        .tooltip.bs-tooltip-auto[x-placement^=bottom], .tooltip.bs-tooltip-bottom {
            padding: 5px 0
        }

        .tooltip.bs-tooltip-auto[x-placement^=bottom] .arrow, .tooltip.bs-tooltip-bottom .arrow {
            top: 0
        }

        .tooltip.bs-tooltip-auto[x-placement^=bottom] .arrow::before, .tooltip.bs-tooltip-bottom .arrow::before {
            margin-left: -3px;
            content: "";
            border-width: 0 5px 5px;
            border-bottom-color: #000
        }

        .tooltip.bs-tooltip-auto[x-placement^=left], .tooltip.bs-tooltip-left {
            padding: 0 5px
        }

        .tooltip.bs-tooltip-auto[x-placement^=left] .arrow, .tooltip.bs-tooltip-left .arrow {
            right: 0
        }

        .tooltip.bs-tooltip-auto[x-placement^=left] .arrow::before, .tooltip.bs-tooltip-left .arrow::before {
            right: 0;
            margin-top: -3px;
            content: "";
            border-width: 5px 0 5px 5px;
            border-left-color: #000
        }

        .tooltip-inner {
            max-width: 200px;
            padding: 3px 8px;
            color: #fff;
            text-align: center;
            background-color: #000;
            border-radius: .25rem
        }

        .popover {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1060;
            display: block;
            max-width: 276px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-style: normal;
            font-weight: 400;
            line-height: 1.5;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            white-space: normal;
            line-break: auto;
            font-size: .875rem;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: .3rem
        }

        .popover .arrow {
            position: absolute;
            display: block;
            width: .8rem;
            height: .4rem
        }

        .popover .arrow::after, .popover .arrow::before {
            position: absolute;
            display: block;
            border-color: transparent;
            border-style: solid
        }

        .popover .arrow::before {
            content: "";
            border-width: .8rem
        }

        .popover .arrow::after {
            content: "";
            border-width: .8rem
        }

        .popover.bs-popover-auto[x-placement^=top], .popover.bs-popover-top {
            margin-bottom: .8rem
        }

        .popover.bs-popover-auto[x-placement^=top] .arrow, .popover.bs-popover-top .arrow {
            bottom: 0
        }

        .popover.bs-popover-auto[x-placement^=top] .arrow::after, .popover.bs-popover-auto[x-placement^=top] .arrow::before, .popover.bs-popover-top .arrow::after, .popover.bs-popover-top .arrow::before {
            border-bottom-width: 0
        }

        .popover.bs-popover-auto[x-placement^=top] .arrow::before, .popover.bs-popover-top .arrow::before {
            bottom: -.8rem;
            margin-left: -.8rem;
            border-top-color: rgba(0, 0, 0, .25)
        }

        .popover.bs-popover-auto[x-placement^=top] .arrow::after, .popover.bs-popover-top .arrow::after {
            bottom: calc((.8rem - 1px) * -1);
            margin-left: -.8rem;
            border-top-color: #fff
        }

        .popover.bs-popover-auto[x-placement^=right], .popover.bs-popover-right {
            margin-left: .8rem
        }

        .popover.bs-popover-auto[x-placement^=right] .arrow, .popover.bs-popover-right .arrow {
            left: 0
        }

        .popover.bs-popover-auto[x-placement^=right] .arrow::after, .popover.bs-popover-auto[x-placement^=right] .arrow::before, .popover.bs-popover-right .arrow::after, .popover.bs-popover-right .arrow::before {
            margin-top: -.8rem;
            border-left-width: 0
        }

        .popover.bs-popover-auto[x-placement^=right] .arrow::before, .popover.bs-popover-right .arrow::before {
            left: -.8rem;
            border-right-color: rgba(0, 0, 0, .25)
        }

        .popover.bs-popover-auto[x-placement^=right] .arrow::after, .popover.bs-popover-right .arrow::after {
            left: calc((.8rem - 1px) * -1);
            border-right-color: #fff
        }

        .popover.bs-popover-auto[x-placement^=bottom], .popover.bs-popover-bottom {
            margin-top: .8rem
        }

        .popover.bs-popover-auto[x-placement^=bottom] .arrow, .popover.bs-popover-bottom .arrow {
            top: 0
        }

        .popover.bs-popover-auto[x-placement^=bottom] .arrow::after, .popover.bs-popover-auto[x-placement^=bottom] .arrow::before, .popover.bs-popover-bottom .arrow::after, .popover.bs-popover-bottom .arrow::before {
            margin-left: -.8rem;
            border-top-width: 0
        }

        .popover.bs-popover-auto[x-placement^=bottom] .arrow::before, .popover.bs-popover-bottom .arrow::before {
            top: -.8rem;
            border-bottom-color: rgba(0, 0, 0, .25)
        }

        .popover.bs-popover-auto[x-placement^=bottom] .arrow::after, .popover.bs-popover-bottom .arrow::after {
            top: calc((.8rem - 1px) * -1);
            border-bottom-color: #fff
        }

        .popover.bs-popover-auto[x-placement^=bottom] .popover-header::before, .popover.bs-popover-bottom .popover-header::before {
            position: absolute;
            top: 0;
            left: 50%;
            display: block;
            width: 20px;
            margin-left: -10px;
            content: "";
            border-bottom: 1px solid #f7f7f7
        }

        .popover.bs-popover-auto[x-placement^=left], .popover.bs-popover-left {
            margin-right: .8rem
        }

        .popover.bs-popover-auto[x-placement^=left] .arrow, .popover.bs-popover-left .arrow {
            right: 0
        }

        .popover.bs-popover-auto[x-placement^=left] .arrow::after, .popover.bs-popover-auto[x-placement^=left] .arrow::before, .popover.bs-popover-left .arrow::after, .popover.bs-popover-left .arrow::before {
            margin-top: -.8rem;
            border-right-width: 0
        }

        .popover.bs-popover-auto[x-placement^=left] .arrow::before, .popover.bs-popover-left .arrow::before {
            right: -.8rem;
            border-left-color: rgba(0, 0, 0, .25)
        }

        .popover.bs-popover-auto[x-placement^=left] .arrow::after, .popover.bs-popover-left .arrow::after {
            right: calc((.8rem - 1px) * -1);
            border-left-color: #fff
        }

        .popover-header {
            padding: .5rem .75rem;
            margin-bottom: 0;
            font-size: 1rem;
            color: inherit;
            background-color: #f7f7f7;
            border-bottom: 1px solid #ebebeb;
            border-top-left-radius: calc(.3rem - 1px);
            border-top-right-radius: calc(.3rem - 1px)
        }

        .popover-header:empty {
            display: none
        }

        .popover-body {
            padding: .5rem .75rem;
            color: #212529
        }

        .carousel {
            position: relative
        }

        .carousel-inner {
            position: relative;
            width: 100%;
            overflow: hidden
        }

        .carousel-item {
            position: relative;
            display: none;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            transition: -webkit-transform .6s ease;
            transition: transform .6s ease;
            transition: transform .6s ease, -webkit-transform .6s ease;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-perspective: 1000px;
            perspective: 1000px
        }

        .carousel-item-next, .carousel-item-prev, .carousel-item.active {
            display: block
        }

        .carousel-item-next, .carousel-item-prev {
            position: absolute;
            top: 0
        }

        .carousel-item-next.carousel-item-left, .carousel-item-prev.carousel-item-right {
            -webkit-transform: translateX(0);
            transform: translateX(0)
        }

        @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)) {
            .carousel-item-next.carousel-item-left, .carousel-item-prev.carousel-item-right {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0)
            }
        }

        .active.carousel-item-right, .carousel-item-next {
            -webkit-transform: translateX(100%);
            transform: translateX(100%)
        }

        @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)) {
            .active.carousel-item-right, .carousel-item-next {
                -webkit-transform: translate3d(100%, 0, 0);
                transform: translate3d(100%, 0, 0)
            }
        }

        .active.carousel-item-left, .carousel-item-prev {
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%)
        }

        @supports ((-webkit-transform-style:preserve-3d) or (transform-style:preserve-3d)) {
            .active.carousel-item-left, .carousel-item-prev {
                -webkit-transform: translate3d(-100%, 0, 0);
                transform: translate3d(-100%, 0, 0)
            }
        }

        .carousel-control-next, .carousel-control-prev {
            position: absolute;
            top: 0;
            bottom: 0;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 15%;
            color: #fff;
            text-align: center;
            opacity: .5
        }

        .carousel-control-next:focus, .carousel-control-next:hover, .carousel-control-prev:focus, .carousel-control-prev:hover {
            color: #fff;
            text-decoration: none;
            outline: 0;
            opacity: .9
        }

        .carousel-control-prev {
            left: 0
        }

        .carousel-control-next {
            right: 0
        }

        .carousel-control-next-icon, .carousel-control-prev-icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            background: transparent no-repeat center center;
            background-size: 100% 100%
        }

        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E")
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")
        }

        .carousel-indicators {
            position: absolute;
            right: 0;
            bottom: 10px;
            left: 0;
            z-index: 15;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: center;
            justify-content: center;
            padding-left: 0;
            margin-right: 15%;
            margin-left: 15%;
            list-style: none
        }

        .carousel-indicators li {
            position: relative;
            -ms-flex: 0 1 auto;
            flex: 0 1 auto;
            width: 30px;
            height: 3px;
            margin-right: 3px;
            margin-left: 3px;
            text-indent: -999px;
            background-color: rgba(255, 255, 255, .5)
        }

        .carousel-indicators li::before {
            position: absolute;
            top: -10px;
            left: 0;
            display: inline-block;
            width: 100%;
            height: 10px;
            content: ""
        }

        .carousel-indicators li::after {
            position: absolute;
            bottom: -10px;
            left: 0;
            display: inline-block;
            width: 100%;
            height: 10px;
            content: ""
        }

        .carousel-indicators .active {
            background-color: #fff
        }

        .carousel-caption {
            position: absolute;
            right: 15%;
            bottom: 20px;
            left: 15%;
            z-index: 10;
            padding-top: 20px;
            padding-bottom: 20px;
            color: #fff;
            text-align: center
        }

        .align-baseline {
            vertical-align: baseline !important
        }

        .align-top {
            vertical-align: top !important
        }

        .align-middle {
            vertical-align: middle !important
        }

        .align-bottom {
            vertical-align: bottom !important
        }

        .align-text-bottom {
            vertical-align: text-bottom !important
        }

        .align-text-top {
            vertical-align: text-top !important
        }

        .bg-primary {
            background-color: #007bff !important
        }

        a.bg-primary:focus, a.bg-primary:hover {
            background-color: #0062cc !important
        }

        .bg-secondary {
            background-color: #868e96 !important
        }

        a.bg-secondary:focus, a.bg-secondary:hover {
            background-color: #6c757d !important
        }

        .bg-success {
            background-color: #28a745 !important
        }

        a.bg-success:focus, a.bg-success:hover {
            background-color: #1e7e34 !important
        }

        .bg-info {
            background-color: #17a2b8 !important
        }

        a.bg-info:focus, a.bg-info:hover {
            background-color: #117a8b !important
        }

        .bg-warning {
            background-color: #ffc107 !important
        }

        a.bg-warning:focus, a.bg-warning:hover {
            background-color: #d39e00 !important
        }

        .bg-danger {
            background-color: #dc3545 !important
        }

        a.bg-danger:focus, a.bg-danger:hover {
            background-color: #bd2130 !important
        }

        .bg-light {
            background-color: #f8f9fa !important
        }

        a.bg-light:focus, a.bg-light:hover {
            background-color: #dae0e5 !important
        }

        .bg-dark {
            background-color: #343a40 !important
        }

        a.bg-dark:focus, a.bg-dark:hover {
            background-color: #1d2124 !important
        }

        .bg-white {
            background-color: #fff !important
        }

        .bg-transparent {
            background-color: transparent !important
        }

        .border {
            border: 1px solid #e9ecef !important
        }

        .border-0 {
            border: 0 !important
        }

        .border-top-0 {
            border-top: 0 !important
        }

        .border-right-0 {
            border-right: 0 !important
        }

        .border-bottom-0 {
            border-bottom: 0 !important
        }

        .border-left-0 {
            border-left: 0 !important
        }

        .border-primary {
            border-color: #007bff !important
        }

        .border-secondary {
            border-color: #868e96 !important
        }

        .border-success {
            border-color: #28a745 !important
        }

        .border-info {
            border-color: #17a2b8 !important
        }

        .border-warning {
            border-color: #ffc107 !important
        }

        .border-danger {
            border-color: #dc3545 !important
        }

        .border-light {
            border-color: #f8f9fa !important
        }

        .border-dark {
            border-color: #343a40 !important
        }

        .border-white {
            border-color: #fff !important
        }

        .rounded {
            border-radius: .25rem !important
        }

        .rounded-top {
            border-top-left-radius: .25rem !important;
            border-top-right-radius: .25rem !important
        }

        .rounded-right {
            border-top-right-radius: .25rem !important;
            border-bottom-right-radius: .25rem !important
        }

        .rounded-bottom {
            border-bottom-right-radius: .25rem !important;
            border-bottom-left-radius: .25rem !important
        }

        .rounded-left {
            border-top-left-radius: .25rem !important;
            border-bottom-left-radius: .25rem !important
        }

        .rounded-circle {
            border-radius: 50% !important
        }

        .rounded-0 {
            border-radius: 0 !important
        }

        .clearfix::after {
            display: block;
            clear: both;
            content: ""
        }

        .d-none {
            display: none !important
        }

        .d-inline {
            display: inline !important
        }

        .d-inline-block {
            display: inline-block !important
        }

        .d-block {
            display: block !important
        }

        .d-table {
            display: table !important
        }

        .d-table-row {
            display: table-row !important
        }

        .d-table-cell {
            display: table-cell !important
        }

        .d-flex {
            display: -ms-flexbox !important;
            display: flex !important
        }

        .d-inline-flex {
            display: -ms-inline-flexbox !important;
            display: inline-flex !important
        }

        @media (min-width: 576px) {
            .d-sm-none {
                display: none !important
            }

            .d-sm-inline {
                display: inline !important
            }

            .d-sm-inline-block {
                display: inline-block !important
            }

            .d-sm-block {
                display: block !important
            }

            .d-sm-table {
                display: table !important
            }

            .d-sm-table-row {
                display: table-row !important
            }

            .d-sm-table-cell {
                display: table-cell !important
            }

            .d-sm-flex {
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-sm-inline-flex {
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }
        }

        @media (min-width: 768px) {
            .d-md-none {
                display: none !important
            }

            .d-md-inline {
                display: inline !important
            }

            .d-md-inline-block {
                display: inline-block !important
            }

            .d-md-block {
                display: block !important
            }

            .d-md-table {
                display: table !important
            }

            .d-md-table-row {
                display: table-row !important
            }

            .d-md-table-cell {
                display: table-cell !important
            }

            .d-md-flex {
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-md-inline-flex {
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }
        }

        @media (min-width: 992px) {
            .d-lg-none {
                display: none !important
            }

            .d-lg-inline {
                display: inline !important
            }

            .d-lg-inline-block {
                display: inline-block !important
            }

            .d-lg-block {
                display: block !important
            }

            .d-lg-table {
                display: table !important
            }

            .d-lg-table-row {
                display: table-row !important
            }

            .d-lg-table-cell {
                display: table-cell !important
            }

            .d-lg-flex {
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-lg-inline-flex {
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }
        }

        @media (min-width: 1200px) {
            .d-xl-none {
                display: none !important
            }

            .d-xl-inline {
                display: inline !important
            }

            .d-xl-inline-block {
                display: inline-block !important
            }

            .d-xl-block {
                display: block !important
            }

            .d-xl-table {
                display: table !important
            }

            .d-xl-table-row {
                display: table-row !important
            }

            .d-xl-table-cell {
                display: table-cell !important
            }

            .d-xl-flex {
                display: -ms-flexbox !important;
                display: flex !important
            }

            .d-xl-inline-flex {
                display: -ms-inline-flexbox !important;
                display: inline-flex !important
            }
        }

        .d-print-block {
            display: none !important
        }

        @media print {
            .d-print-block {
                display: block !important
            }
        }

        .d-print-inline {
            display: none !important
        }

        @media print {
            .d-print-inline {
                display: inline !important
            }
        }

        .d-print-inline-block {
            display: none !important
        }

        @media print {
            .d-print-inline-block {
                display: inline-block !important
            }
        }

        @media print {
            .d-print-none {
                display: none !important
            }
        }

        .embed-responsive {
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            overflow: hidden
        }

        .embed-responsive::before {
            display: block;
            content: ""
        }

        .embed-responsive .embed-responsive-item, .embed-responsive embed, .embed-responsive iframe, .embed-responsive object, .embed-responsive video {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0
        }

        .embed-responsive-21by9::before {
            padding-top: 42.857143%
        }

        .embed-responsive-16by9::before {
            padding-top: 56.25%
        }

        .embed-responsive-4by3::before {
            padding-top: 75%
        }

        .embed-responsive-1by1::before {
            padding-top: 100%
        }

        .flex-row {
            -ms-flex-direction: row !important;
            flex-direction: row !important
        }

        .flex-column {
            -ms-flex-direction: column !important;
            flex-direction: column !important
        }

        .flex-row-reverse {
            -ms-flex-direction: row-reverse !important;
            flex-direction: row-reverse !important
        }

        .flex-column-reverse {
            -ms-flex-direction: column-reverse !important;
            flex-direction: column-reverse !important
        }

        .flex-wrap {
            -ms-flex-wrap: wrap !important;
            flex-wrap: wrap !important
        }

        .flex-nowrap {
            -ms-flex-wrap: nowrap !important;
            flex-wrap: nowrap !important
        }

        .flex-wrap-reverse {
            -ms-flex-wrap: wrap-reverse !important;
            flex-wrap: wrap-reverse !important
        }

        .justify-content-start {
            -ms-flex-pack: start !important;
            justify-content: flex-start !important
        }

        .justify-content-end {
            -ms-flex-pack: end !important;
            justify-content: flex-end !important
        }

        .justify-content-center {
            -ms-flex-pack: center !important;
            justify-content: center !important
        }

        .justify-content-between {
            -ms-flex-pack: justify !important;
            justify-content: space-between !important
        }

        .justify-content-around {
            -ms-flex-pack: distribute !important;
            justify-content: space-around !important
        }

        .align-items-start {
            -ms-flex-align: start !important;
            align-items: flex-start !important
        }

        .align-items-end {
            -ms-flex-align: end !important;
            align-items: flex-end !important
        }

        .align-items-center {
            -ms-flex-align: center !important;
            align-items: center !important
        }

        .align-items-baseline {
            -ms-flex-align: baseline !important;
            align-items: baseline !important
        }

        .align-items-stretch {
            -ms-flex-align: stretch !important;
            align-items: stretch !important
        }

        .align-content-start {
            -ms-flex-line-pack: start !important;
            align-content: flex-start !important
        }

        .align-content-end {
            -ms-flex-line-pack: end !important;
            align-content: flex-end !important
        }

        .align-content-center {
            -ms-flex-line-pack: center !important;
            align-content: center !important
        }

        .align-content-between {
            -ms-flex-line-pack: justify !important;
            align-content: space-between !important
        }

        .align-content-around {
            -ms-flex-line-pack: distribute !important;
            align-content: space-around !important
        }

        .align-content-stretch {
            -ms-flex-line-pack: stretch !important;
            align-content: stretch !important
        }

        .align-self-auto {
            -ms-flex-item-align: auto !important;
            align-self: auto !important
        }

        .align-self-start {
            -ms-flex-item-align: start !important;
            align-self: flex-start !important
        }

        .align-self-end {
            -ms-flex-item-align: end !important;
            align-self: flex-end !important
        }

        .align-self-center {
            -ms-flex-item-align: center !important;
            align-self: center !important
        }

        .align-self-baseline {
            -ms-flex-item-align: baseline !important;
            align-self: baseline !important
        }

        .align-self-stretch {
            -ms-flex-item-align: stretch !important;
            align-self: stretch !important
        }

        @media (min-width: 576px) {
            .flex-sm-row {
                -ms-flex-direction: row !important;
                flex-direction: row !important
            }

            .flex-sm-column {
                -ms-flex-direction: column !important;
                flex-direction: column !important
            }

            .flex-sm-row-reverse {
                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important
            }

            .flex-sm-column-reverse {
                -ms-flex-direction: column-reverse !important;
                flex-direction: column-reverse !important
            }

            .flex-sm-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }

            .flex-sm-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important
            }

            .flex-sm-wrap-reverse {
                -ms-flex-wrap: wrap-reverse !important;
                flex-wrap: wrap-reverse !important
            }

            .justify-content-sm-start {
                -ms-flex-pack: start !important;
                justify-content: flex-start !important
            }

            .justify-content-sm-end {
                -ms-flex-pack: end !important;
                justify-content: flex-end !important
            }

            .justify-content-sm-center {
                -ms-flex-pack: center !important;
                justify-content: center !important
            }

            .justify-content-sm-between {
                -ms-flex-pack: justify !important;
                justify-content: space-between !important
            }

            .justify-content-sm-around {
                -ms-flex-pack: distribute !important;
                justify-content: space-around !important
            }

            .align-items-sm-start {
                -ms-flex-align: start !important;
                align-items: flex-start !important
            }

            .align-items-sm-end {
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .align-items-sm-center {
                -ms-flex-align: center !important;
                align-items: center !important
            }

            .align-items-sm-baseline {
                -ms-flex-align: baseline !important;
                align-items: baseline !important
            }

            .align-items-sm-stretch {
                -ms-flex-align: stretch !important;
                align-items: stretch !important
            }

            .align-content-sm-start {
                -ms-flex-line-pack: start !important;
                align-content: flex-start !important
            }

            .align-content-sm-end {
                -ms-flex-line-pack: end !important;
                align-content: flex-end !important
            }

            .align-content-sm-center {
                -ms-flex-line-pack: center !important;
                align-content: center !important
            }

            .align-content-sm-between {
                -ms-flex-line-pack: justify !important;
                align-content: space-between !important
            }

            .align-content-sm-around {
                -ms-flex-line-pack: distribute !important;
                align-content: space-around !important
            }

            .align-content-sm-stretch {
                -ms-flex-line-pack: stretch !important;
                align-content: stretch !important
            }

            .align-self-sm-auto {
                -ms-flex-item-align: auto !important;
                align-self: auto !important
            }

            .align-self-sm-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important
            }

            .align-self-sm-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important
            }

            .align-self-sm-center {
                -ms-flex-item-align: center !important;
                align-self: center !important
            }

            .align-self-sm-baseline {
                -ms-flex-item-align: baseline !important;
                align-self: baseline !important
            }

            .align-self-sm-stretch {
                -ms-flex-item-align: stretch !important;
                align-self: stretch !important
            }
        }

        @media (min-width: 768px) {
            .flex-md-row {
                -ms-flex-direction: row !important;
                flex-direction: row !important
            }

            .flex-md-column {
                -ms-flex-direction: column !important;
                flex-direction: column !important
            }

            .flex-md-row-reverse {
                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important
            }

            .flex-md-column-reverse {
                -ms-flex-direction: column-reverse !important;
                flex-direction: column-reverse !important
            }

            .flex-md-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }

            .flex-md-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important
            }

            .flex-md-wrap-reverse {
                -ms-flex-wrap: wrap-reverse !important;
                flex-wrap: wrap-reverse !important
            }

            .justify-content-md-start {
                -ms-flex-pack: start !important;
                justify-content: flex-start !important
            }

            .justify-content-md-end {
                -ms-flex-pack: end !important;
                justify-content: flex-end !important
            }

            .justify-content-md-center {
                -ms-flex-pack: center !important;
                justify-content: center !important
            }

            .justify-content-md-between {
                -ms-flex-pack: justify !important;
                justify-content: space-between !important
            }

            .justify-content-md-around {
                -ms-flex-pack: distribute !important;
                justify-content: space-around !important
            }

            .align-items-md-start {
                -ms-flex-align: start !important;
                align-items: flex-start !important
            }

            .align-items-md-end {
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .align-items-md-center {
                -ms-flex-align: center !important;
                align-items: center !important
            }

            .align-items-md-baseline {
                -ms-flex-align: baseline !important;
                align-items: baseline !important
            }

            .align-items-md-stretch {
                -ms-flex-align: stretch !important;
                align-items: stretch !important
            }

            .align-content-md-start {
                -ms-flex-line-pack: start !important;
                align-content: flex-start !important
            }

            .align-content-md-end {
                -ms-flex-line-pack: end !important;
                align-content: flex-end !important
            }

            .align-content-md-center {
                -ms-flex-line-pack: center !important;
                align-content: center !important
            }

            .align-content-md-between {
                -ms-flex-line-pack: justify !important;
                align-content: space-between !important
            }

            .align-content-md-around {
                -ms-flex-line-pack: distribute !important;
                align-content: space-around !important
            }

            .align-content-md-stretch {
                -ms-flex-line-pack: stretch !important;
                align-content: stretch !important
            }

            .align-self-md-auto {
                -ms-flex-item-align: auto !important;
                align-self: auto !important
            }

            .align-self-md-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important
            }

            .align-self-md-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important
            }

            .align-self-md-center {
                -ms-flex-item-align: center !important;
                align-self: center !important
            }

            .align-self-md-baseline {
                -ms-flex-item-align: baseline !important;
                align-self: baseline !important
            }

            .align-self-md-stretch {
                -ms-flex-item-align: stretch !important;
                align-self: stretch !important
            }
        }

        @media (min-width: 992px) {
            .flex-lg-row {
                -ms-flex-direction: row !important;
                flex-direction: row !important
            }

            .flex-lg-column {
                -ms-flex-direction: column !important;
                flex-direction: column !important
            }

            .flex-lg-row-reverse {
                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important
            }

            .flex-lg-column-reverse {
                -ms-flex-direction: column-reverse !important;
                flex-direction: column-reverse !important
            }

            .flex-lg-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }

            .flex-lg-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important
            }

            .flex-lg-wrap-reverse {
                -ms-flex-wrap: wrap-reverse !important;
                flex-wrap: wrap-reverse !important
            }

            .justify-content-lg-start {
                -ms-flex-pack: start !important;
                justify-content: flex-start !important
            }

            .justify-content-lg-end {
                -ms-flex-pack: end !important;
                justify-content: flex-end !important
            }

            .justify-content-lg-center {
                -ms-flex-pack: center !important;
                justify-content: center !important
            }

            .justify-content-lg-between {
                -ms-flex-pack: justify !important;
                justify-content: space-between !important
            }

            .justify-content-lg-around {
                -ms-flex-pack: distribute !important;
                justify-content: space-around !important
            }

            .align-items-lg-start {
                -ms-flex-align: start !important;
                align-items: flex-start !important
            }

            .align-items-lg-end {
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .align-items-lg-center {
                -ms-flex-align: center !important;
                align-items: center !important
            }

            .align-items-lg-baseline {
                -ms-flex-align: baseline !important;
                align-items: baseline !important
            }

            .align-items-lg-stretch {
                -ms-flex-align: stretch !important;
                align-items: stretch !important
            }

            .align-content-lg-start {
                -ms-flex-line-pack: start !important;
                align-content: flex-start !important
            }

            .align-content-lg-end {
                -ms-flex-line-pack: end !important;
                align-content: flex-end !important
            }

            .align-content-lg-center {
                -ms-flex-line-pack: center !important;
                align-content: center !important
            }

            .align-content-lg-between {
                -ms-flex-line-pack: justify !important;
                align-content: space-between !important
            }

            .align-content-lg-around {
                -ms-flex-line-pack: distribute !important;
                align-content: space-around !important
            }

            .align-content-lg-stretch {
                -ms-flex-line-pack: stretch !important;
                align-content: stretch !important
            }

            .align-self-lg-auto {
                -ms-flex-item-align: auto !important;
                align-self: auto !important
            }

            .align-self-lg-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important
            }

            .align-self-lg-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important
            }

            .align-self-lg-center {
                -ms-flex-item-align: center !important;
                align-self: center !important
            }

            .align-self-lg-baseline {
                -ms-flex-item-align: baseline !important;
                align-self: baseline !important
            }

            .align-self-lg-stretch {
                -ms-flex-item-align: stretch !important;
                align-self: stretch !important
            }
        }

        @media (min-width: 1200px) {
            .flex-xl-row {
                -ms-flex-direction: row !important;
                flex-direction: row !important
            }

            .flex-xl-column {
                -ms-flex-direction: column !important;
                flex-direction: column !important
            }

            .flex-xl-row-reverse {
                -ms-flex-direction: row-reverse !important;
                flex-direction: row-reverse !important
            }

            .flex-xl-column-reverse {
                -ms-flex-direction: column-reverse !important;
                flex-direction: column-reverse !important
            }

            .flex-xl-wrap {
                -ms-flex-wrap: wrap !important;
                flex-wrap: wrap !important
            }

            .flex-xl-nowrap {
                -ms-flex-wrap: nowrap !important;
                flex-wrap: nowrap !important
            }

            .flex-xl-wrap-reverse {
                -ms-flex-wrap: wrap-reverse !important;
                flex-wrap: wrap-reverse !important
            }

            .justify-content-xl-start {
                -ms-flex-pack: start !important;
                justify-content: flex-start !important
            }

            .justify-content-xl-end {
                -ms-flex-pack: end !important;
                justify-content: flex-end !important
            }

            .justify-content-xl-center {
                -ms-flex-pack: center !important;
                justify-content: center !important
            }

            .justify-content-xl-between {
                -ms-flex-pack: justify !important;
                justify-content: space-between !important
            }

            .justify-content-xl-around {
                -ms-flex-pack: distribute !important;
                justify-content: space-around !important
            }

            .align-items-xl-start {
                -ms-flex-align: start !important;
                align-items: flex-start !important
            }

            .align-items-xl-end {
                -ms-flex-align: end !important;
                align-items: flex-end !important
            }

            .align-items-xl-center {
                -ms-flex-align: center !important;
                align-items: center !important
            }

            .align-items-xl-baseline {
                -ms-flex-align: baseline !important;
                align-items: baseline !important
            }

            .align-items-xl-stretch {
                -ms-flex-align: stretch !important;
                align-items: stretch !important
            }

            .align-content-xl-start {
                -ms-flex-line-pack: start !important;
                align-content: flex-start !important
            }

            .align-content-xl-end {
                -ms-flex-line-pack: end !important;
                align-content: flex-end !important
            }

            .align-content-xl-center {
                -ms-flex-line-pack: center !important;
                align-content: center !important
            }

            .align-content-xl-between {
                -ms-flex-line-pack: justify !important;
                align-content: space-between !important
            }

            .align-content-xl-around {
                -ms-flex-line-pack: distribute !important;
                align-content: space-around !important
            }

            .align-content-xl-stretch {
                -ms-flex-line-pack: stretch !important;
                align-content: stretch !important
            }

            .align-self-xl-auto {
                -ms-flex-item-align: auto !important;
                align-self: auto !important
            }

            .align-self-xl-start {
                -ms-flex-item-align: start !important;
                align-self: flex-start !important
            }

            .align-self-xl-end {
                -ms-flex-item-align: end !important;
                align-self: flex-end !important
            }

            .align-self-xl-center {
                -ms-flex-item-align: center !important;
                align-self: center !important
            }

            .align-self-xl-baseline {
                -ms-flex-item-align: baseline !important;
                align-self: baseline !important
            }

            .align-self-xl-stretch {
                -ms-flex-item-align: stretch !important;
                align-self: stretch !important
            }
        }

        .float-left {
            float: left !important
        }

        .float-right {
            float: right !important
        }

        .float-none {
            float: none !important
        }

        @media (min-width: 576px) {
            .float-sm-left {
                float: left !important
            }

            .float-sm-right {
                float: right !important
            }

            .float-sm-none {
                float: none !important
            }
        }

        @media (min-width: 768px) {
            .float-md-left {
                float: left !important
            }

            .float-md-right {
                float: right !important
            }

            .float-md-none {
                float: none !important
            }
        }

        @media (min-width: 992px) {
            .float-lg-left {
                float: left !important
            }

            .float-lg-right {
                float: right !important
            }

            .float-lg-none {
                float: none !important
            }
        }

        @media (min-width: 1200px) {
            .float-xl-left {
                float: left !important
            }

            .float-xl-right {
                float: right !important
            }

            .float-xl-none {
                float: none !important
            }
        }

        .position-static {
            position: static !important
        }

        .position-relative {
            position: relative !important
        }

        .position-absolute {
            position: absolute !important
        }

        .position-fixed {
            position: fixed !important
        }

        .position-sticky {
            position: -webkit-sticky !important;
            position: sticky !important
        }

        .fixed-top {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030
        }

        .fixed-bottom {
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1030
        }

        @supports ((position:-webkit-sticky) or (position:sticky)) {
            .sticky-top {
                position: -webkit-sticky;
                position: sticky;
                top: 0;
                z-index: 1020
            }
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            -webkit-clip-path: inset(50%);
            clip-path: inset(50%);
            border: 0
        }

        .sr-only-focusable:active, .sr-only-focusable:focus {
            position: static;
            width: auto;
            height: auto;
            overflow: visible;
            clip: auto;
            white-space: normal;
            -webkit-clip-path: none;
            clip-path: none
        }

        .w-25 {
            width: 25% !important
        }

        .w-50 {
            width: 50% !important
        }

        .w-75 {
            width: 75% !important
        }

        .w-100 {
            width: 100% !important
        }

        .h-25 {
            height: 25% !important
        }

        .h-50 {
            height: 50% !important
        }

        .h-75 {
            height: 75% !important
        }

        .h-100 {
            height: 100% !important
        }

        .mw-100 {
            max-width: 100% !important
        }

        .mh-100 {
            max-height: 100% !important
        }

        .m-0 {
            margin: 0 !important
        }

        .mt-0, .my-0 {
            margin-top: 0 !important
        }

        .mr-0, .mx-0 {
            margin-right: 0 !important
        }

        .mb-0, .my-0 {
            margin-bottom: 0 !important
        }

        .ml-0, .mx-0 {
            margin-left: 0 !important
        }

        .m-1 {
            margin: .25rem !important
        }

        .mt-1, .my-1 {
            margin-top: .25rem !important
        }

        .mr-1, .mx-1 {
            margin-right: .25rem !important
        }

        .mb-1, .my-1 {
            margin-bottom: .25rem !important
        }

        .ml-1, .mx-1 {
            margin-left: .25rem !important
        }

        .m-2 {
            margin: .5rem !important
        }

        .mt-2, .my-2 {
            margin-top: .5rem !important
        }

        .mr-2, .mx-2 {
            margin-right: .5rem !important
        }

        .mb-2, .my-2 {
            margin-bottom: .5rem !important
        }

        .ml-2, .mx-2 {
            margin-left: .5rem !important
        }

        .m-3 {
            margin: 1rem !important
        }

        .mt-3, .my-3 {
            margin-top: 1rem !important
        }

        .mr-3, .mx-3 {
            margin-right: 1rem !important
        }

        .mb-3, .my-3 {
            margin-bottom: 1rem !important
        }

        .ml-3, .mx-3 {
            margin-left: 1rem !important
        }

        .m-4 {
            margin: 1.5rem !important
        }

        .mt-4, .my-4 {
            margin-top: 1.5rem !important
        }

        .mr-4, .mx-4 {
            margin-right: 1.5rem !important
        }

        .mb-4, .my-4 {
            margin-bottom: 1.5rem !important
        }

        .ml-4, .mx-4 {
            margin-left: 1.5rem !important
        }

        .m-5 {
            margin: 3rem !important
        }

        .mt-5, .my-5 {
            margin-top: 3rem !important
        }

        .mr-5, .mx-5 {
            margin-right: 3rem !important
        }

        .mb-5, .my-5 {
            margin-bottom: 3rem !important
        }

        .ml-5, .mx-5 {
            margin-left: 3rem !important
        }

        .p-0 {
            padding: 0 !important
        }

        .pt-0, .py-0 {
            padding-top: 0 !important
        }

        .pr-0, .px-0 {
            padding-right: 0 !important
        }

        .pb-0, .py-0 {
            padding-bottom: 0 !important
        }

        .pl-0, .px-0 {
            padding-left: 0 !important
        }

        .p-1 {
            padding: .25rem !important
        }

        .pt-1, .py-1 {
            padding-top: .25rem !important
        }

        .pr-1, .px-1 {
            padding-right: .25rem !important
        }

        .pb-1, .py-1 {
            padding-bottom: .25rem !important
        }

        .pl-1, .px-1 {
            padding-left: .25rem !important
        }

        .p-2 {
            padding: .5rem !important
        }

        .pt-2, .py-2 {
            padding-top: .5rem !important
        }

        .pr-2, .px-2 {
            padding-right: .5rem !important
        }

        .pb-2, .py-2 {
            padding-bottom: .5rem !important
        }

        .pl-2, .px-2 {
            padding-left: .5rem !important
        }

        .p-3 {
            padding: 1rem !important
        }

        .pt-3, .py-3 {
            padding-top: 1rem !important
        }

        .pr-3, .px-3 {
            padding-right: 1rem !important
        }

        .pb-3, .py-3 {
            padding-bottom: 1rem !important
        }

        .pl-3, .px-3 {
            padding-left: 1rem !important
        }

        .p-4 {
            padding: 1.5rem !important
        }

        .pt-4, .py-4 {
            padding-top: 1.5rem !important
        }

        .pr-4, .px-4 {
            padding-right: 1.5rem !important
        }

        .pb-4, .py-4 {
            padding-bottom: 1.5rem !important
        }

        .pl-4, .px-4 {
            padding-left: 1.5rem !important
        }

        .p-5 {
            padding: 3rem !important
        }

        .pt-5, .py-5 {
            padding-top: 3rem !important
        }

        .pr-5, .px-5 {
            padding-right: 3rem !important
        }

        .pb-5, .py-5 {
            padding-bottom: 3rem !important
        }

        .pl-5, .px-5 {
            padding-left: 3rem !important
        }

        .m-auto {
            margin: auto !important
        }

        .mt-auto, .my-auto {
            margin-top: auto !important
        }

        .mr-auto, .mx-auto {
            margin-right: auto !important
        }

        .mb-auto, .my-auto {
            margin-bottom: auto !important
        }

        .ml-auto, .mx-auto {
            margin-left: auto !important
        }

        @media (min-width: 576px) {
            .m-sm-0 {
                margin: 0 !important
            }

            .mt-sm-0, .my-sm-0 {
                margin-top: 0 !important
            }

            .mr-sm-0, .mx-sm-0 {
                margin-right: 0 !important
            }

            .mb-sm-0, .my-sm-0 {
                margin-bottom: 0 !important
            }

            .ml-sm-0, .mx-sm-0 {
                margin-left: 0 !important
            }

            .m-sm-1 {
                margin: .25rem !important
            }

            .mt-sm-1, .my-sm-1 {
                margin-top: .25rem !important
            }

            .mr-sm-1, .mx-sm-1 {
                margin-right: .25rem !important
            }

            .mb-sm-1, .my-sm-1 {
                margin-bottom: .25rem !important
            }

            .ml-sm-1, .mx-sm-1 {
                margin-left: .25rem !important
            }

            .m-sm-2 {
                margin: .5rem !important
            }

            .mt-sm-2, .my-sm-2 {
                margin-top: .5rem !important
            }

            .mr-sm-2, .mx-sm-2 {
                margin-right: .5rem !important
            }

            .mb-sm-2, .my-sm-2 {
                margin-bottom: .5rem !important
            }

            .ml-sm-2, .mx-sm-2 {
                margin-left: .5rem !important
            }

            .m-sm-3 {
                margin: 1rem !important
            }

            .mt-sm-3, .my-sm-3 {
                margin-top: 1rem !important
            }

            .mr-sm-3, .mx-sm-3 {
                margin-right: 1rem !important
            }

            .mb-sm-3, .my-sm-3 {
                margin-bottom: 1rem !important
            }

            .ml-sm-3, .mx-sm-3 {
                margin-left: 1rem !important
            }

            .m-sm-4 {
                margin: 1.5rem !important
            }

            .mt-sm-4, .my-sm-4 {
                margin-top: 1.5rem !important
            }

            .mr-sm-4, .mx-sm-4 {
                margin-right: 1.5rem !important
            }

            .mb-sm-4, .my-sm-4 {
                margin-bottom: 1.5rem !important
            }

            .ml-sm-4, .mx-sm-4 {
                margin-left: 1.5rem !important
            }

            .m-sm-5 {
                margin: 3rem !important
            }

            .mt-sm-5, .my-sm-5 {
                margin-top: 3rem !important
            }

            .mr-sm-5, .mx-sm-5 {
                margin-right: 3rem !important
            }

            .mb-sm-5, .my-sm-5 {
                margin-bottom: 3rem !important
            }

            .ml-sm-5, .mx-sm-5 {
                margin-left: 3rem !important
            }

            .p-sm-0 {
                padding: 0 !important
            }

            .pt-sm-0, .py-sm-0 {
                padding-top: 0 !important
            }

            .pr-sm-0, .px-sm-0 {
                padding-right: 0 !important
            }

            .pb-sm-0, .py-sm-0 {
                padding-bottom: 0 !important
            }

            .pl-sm-0, .px-sm-0 {
                padding-left: 0 !important
            }

            .p-sm-1 {
                padding: .25rem !important
            }

            .pt-sm-1, .py-sm-1 {
                padding-top: .25rem !important
            }

            .pr-sm-1, .px-sm-1 {
                padding-right: .25rem !important
            }

            .pb-sm-1, .py-sm-1 {
                padding-bottom: .25rem !important
            }

            .pl-sm-1, .px-sm-1 {
                padding-left: .25rem !important
            }

            .p-sm-2 {
                padding: .5rem !important
            }

            .pt-sm-2, .py-sm-2 {
                padding-top: .5rem !important
            }

            .pr-sm-2, .px-sm-2 {
                padding-right: .5rem !important
            }

            .pb-sm-2, .py-sm-2 {
                padding-bottom: .5rem !important
            }

            .pl-sm-2, .px-sm-2 {
                padding-left: .5rem !important
            }

            .p-sm-3 {
                padding: 1rem !important
            }

            .pt-sm-3, .py-sm-3 {
                padding-top: 1rem !important
            }

            .pr-sm-3, .px-sm-3 {
                padding-right: 1rem !important
            }

            .pb-sm-3, .py-sm-3 {
                padding-bottom: 1rem !important
            }

            .pl-sm-3, .px-sm-3 {
                padding-left: 1rem !important
            }

            .p-sm-4 {
                padding: 1.5rem !important
            }

            .pt-sm-4, .py-sm-4 {
                padding-top: 1.5rem !important
            }

            .pr-sm-4, .px-sm-4 {
                padding-right: 1.5rem !important
            }

            .pb-sm-4, .py-sm-4 {
                padding-bottom: 1.5rem !important
            }

            .pl-sm-4, .px-sm-4 {
                padding-left: 1.5rem !important
            }

            .p-sm-5 {
                padding: 3rem !important
            }

            .pt-sm-5, .py-sm-5 {
                padding-top: 3rem !important
            }

            .pr-sm-5, .px-sm-5 {
                padding-right: 3rem !important
            }

            .pb-sm-5, .py-sm-5 {
                padding-bottom: 3rem !important
            }

            .pl-sm-5, .px-sm-5 {
                padding-left: 3rem !important
            }

            .m-sm-auto {
                margin: auto !important
            }

            .mt-sm-auto, .my-sm-auto {
                margin-top: auto !important
            }

            .mr-sm-auto, .mx-sm-auto {
                margin-right: auto !important
            }

            .mb-sm-auto, .my-sm-auto {
                margin-bottom: auto !important
            }

            .ml-sm-auto, .mx-sm-auto {
                margin-left: auto !important
            }
        }

        @media (min-width: 768px) {
            .m-md-0 {
                margin: 0 !important
            }

            .mt-md-0, .my-md-0 {
                margin-top: 0 !important
            }

            .mr-md-0, .mx-md-0 {
                margin-right: 0 !important
            }

            .mb-md-0, .my-md-0 {
                margin-bottom: 0 !important
            }

            .ml-md-0, .mx-md-0 {
                margin-left: 0 !important
            }

            .m-md-1 {
                margin: .25rem !important
            }

            .mt-md-1, .my-md-1 {
                margin-top: .25rem !important
            }

            .mr-md-1, .mx-md-1 {
                margin-right: .25rem !important
            }

            .mb-md-1, .my-md-1 {
                margin-bottom: .25rem !important
            }

            .ml-md-1, .mx-md-1 {
                margin-left: .25rem !important
            }

            .m-md-2 {
                margin: .5rem !important
            }

            .mt-md-2, .my-md-2 {
                margin-top: .5rem !important
            }

            .mr-md-2, .mx-md-2 {
                margin-right: .5rem !important
            }

            .mb-md-2, .my-md-2 {
                margin-bottom: .5rem !important
            }

            .ml-md-2, .mx-md-2 {
                margin-left: .5rem !important
            }

            .m-md-3 {
                margin: 1rem !important
            }

            .mt-md-3, .my-md-3 {
                margin-top: 1rem !important
            }

            .mr-md-3, .mx-md-3 {
                margin-right: 1rem !important
            }

            .mb-md-3, .my-md-3 {
                margin-bottom: 1rem !important
            }

            .ml-md-3, .mx-md-3 {
                margin-left: 1rem !important
            }

            .m-md-4 {
                margin: 1.5rem !important
            }

            .mt-md-4, .my-md-4 {
                margin-top: 1.5rem !important
            }

            .mr-md-4, .mx-md-4 {
                margin-right: 1.5rem !important
            }

            .mb-md-4, .my-md-4 {
                margin-bottom: 1.5rem !important
            }

            .ml-md-4, .mx-md-4 {
                margin-left: 1.5rem !important
            }

            .m-md-5 {
                margin: 3rem !important
            }

            .mt-md-5, .my-md-5 {
                margin-top: 3rem !important
            }

            .mr-md-5, .mx-md-5 {
                margin-right: 3rem !important
            }

            .mb-md-5, .my-md-5 {
                margin-bottom: 3rem !important
            }

            .ml-md-5, .mx-md-5 {
                margin-left: 3rem !important
            }

            .p-md-0 {
                padding: 0 !important
            }

            .pt-md-0, .py-md-0 {
                padding-top: 0 !important
            }

            .pr-md-0, .px-md-0 {
                padding-right: 0 !important
            }

            .pb-md-0, .py-md-0 {
                padding-bottom: 0 !important
            }

            .pl-md-0, .px-md-0 {
                padding-left: 0 !important
            }

            .p-md-1 {
                padding: .25rem !important
            }

            .pt-md-1, .py-md-1 {
                padding-top: .25rem !important
            }

            .pr-md-1, .px-md-1 {
                padding-right: .25rem !important
            }

            .pb-md-1, .py-md-1 {
                padding-bottom: .25rem !important
            }

            .pl-md-1, .px-md-1 {
                padding-left: .25rem !important
            }

            .p-md-2 {
                padding: .5rem !important
            }

            .pt-md-2, .py-md-2 {
                padding-top: .5rem !important
            }

            .pr-md-2, .px-md-2 {
                padding-right: .5rem !important
            }

            .pb-md-2, .py-md-2 {
                padding-bottom: .5rem !important
            }

            .pl-md-2, .px-md-2 {
                padding-left: .5rem !important
            }

            .p-md-3 {
                padding: 1rem !important
            }

            .pt-md-3, .py-md-3 {
                padding-top: 1rem !important
            }

            .pr-md-3, .px-md-3 {
                padding-right: 1rem !important
            }

            .pb-md-3, .py-md-3 {
                padding-bottom: 1rem !important
            }

            .pl-md-3, .px-md-3 {
                padding-left: 1rem !important
            }

            .p-md-4 {
                padding: 1.5rem !important
            }

            .pt-md-4, .py-md-4 {
                padding-top: 1.5rem !important
            }

            .pr-md-4, .px-md-4 {
                padding-right: 1.5rem !important
            }

            .pb-md-4, .py-md-4 {
                padding-bottom: 1.5rem !important
            }

            .pl-md-4, .px-md-4 {
                padding-left: 1.5rem !important
            }

            .p-md-5 {
                padding: 3rem !important
            }

            .pt-md-5, .py-md-5 {
                padding-top: 3rem !important
            }

            .pr-md-5, .px-md-5 {
                padding-right: 3rem !important
            }

            .pb-md-5, .py-md-5 {
                padding-bottom: 3rem !important
            }

            .pl-md-5, .px-md-5 {
                padding-left: 3rem !important
            }

            .m-md-auto {
                margin: auto !important
            }

            .mt-md-auto, .my-md-auto {
                margin-top: auto !important
            }

            .mr-md-auto, .mx-md-auto {
                margin-right: auto !important
            }

            .mb-md-auto, .my-md-auto {
                margin-bottom: auto !important
            }

            .ml-md-auto, .mx-md-auto {
                margin-left: auto !important
            }
        }

        @media (min-width: 992px) {
            .m-lg-0 {
                margin: 0 !important
            }

            .mt-lg-0, .my-lg-0 {
                margin-top: 0 !important
            }

            .mr-lg-0, .mx-lg-0 {
                margin-right: 0 !important
            }

            .mb-lg-0, .my-lg-0 {
                margin-bottom: 0 !important
            }

            .ml-lg-0, .mx-lg-0 {
                margin-left: 0 !important
            }

            .m-lg-1 {
                margin: .25rem !important
            }

            .mt-lg-1, .my-lg-1 {
                margin-top: .25rem !important
            }

            .mr-lg-1, .mx-lg-1 {
                margin-right: .25rem !important
            }

            .mb-lg-1, .my-lg-1 {
                margin-bottom: .25rem !important
            }

            .ml-lg-1, .mx-lg-1 {
                margin-left: .25rem !important
            }

            .m-lg-2 {
                margin: .5rem !important
            }

            .mt-lg-2, .my-lg-2 {
                margin-top: .5rem !important
            }

            .mr-lg-2, .mx-lg-2 {
                margin-right: .5rem !important
            }

            .mb-lg-2, .my-lg-2 {
                margin-bottom: .5rem !important
            }

            .ml-lg-2, .mx-lg-2 {
                margin-left: .5rem !important
            }

            .m-lg-3 {
                margin: 1rem !important
            }

            .mt-lg-3, .my-lg-3 {
                margin-top: 1rem !important
            }

            .mr-lg-3, .mx-lg-3 {
                margin-right: 1rem !important
            }

            .mb-lg-3, .my-lg-3 {
                margin-bottom: 1rem !important
            }

            .ml-lg-3, .mx-lg-3 {
                margin-left: 1rem !important
            }

            .m-lg-4 {
                margin: 1.5rem !important
            }

            .mt-lg-4, .my-lg-4 {
                margin-top: 1.5rem !important
            }

            .mr-lg-4, .mx-lg-4 {
                margin-right: 1.5rem !important
            }

            .mb-lg-4, .my-lg-4 {
                margin-bottom: 1.5rem !important
            }

            .ml-lg-4, .mx-lg-4 {
                margin-left: 1.5rem !important
            }

            .m-lg-5 {
                margin: 3rem !important
            }

            .mt-lg-5, .my-lg-5 {
                margin-top: 3rem !important
            }

            .mr-lg-5, .mx-lg-5 {
                margin-right: 3rem !important
            }

            .mb-lg-5, .my-lg-5 {
                margin-bottom: 3rem !important
            }

            .ml-lg-5, .mx-lg-5 {
                margin-left: 3rem !important
            }

            .p-lg-0 {
                padding: 0 !important
            }

            .pt-lg-0, .py-lg-0 {
                padding-top: 0 !important
            }

            .pr-lg-0, .px-lg-0 {
                padding-right: 0 !important
            }

            .pb-lg-0, .py-lg-0 {
                padding-bottom: 0 !important
            }

            .pl-lg-0, .px-lg-0 {
                padding-left: 0 !important
            }

            .p-lg-1 {
                padding: .25rem !important
            }

            .pt-lg-1, .py-lg-1 {
                padding-top: .25rem !important
            }

            .pr-lg-1, .px-lg-1 {
                padding-right: .25rem !important
            }

            .pb-lg-1, .py-lg-1 {
                padding-bottom: .25rem !important
            }

            .pl-lg-1, .px-lg-1 {
                padding-left: .25rem !important
            }

            .p-lg-2 {
                padding: .5rem !important
            }

            .pt-lg-2, .py-lg-2 {
                padding-top: .5rem !important
            }

            .pr-lg-2, .px-lg-2 {
                padding-right: .5rem !important
            }

            .pb-lg-2, .py-lg-2 {
                padding-bottom: .5rem !important
            }

            .pl-lg-2, .px-lg-2 {
                padding-left: .5rem !important
            }

            .p-lg-3 {
                padding: 1rem !important
            }

            .pt-lg-3, .py-lg-3 {
                padding-top: 1rem !important
            }

            .pr-lg-3, .px-lg-3 {
                padding-right: 1rem !important
            }

            .pb-lg-3, .py-lg-3 {
                padding-bottom: 1rem !important
            }

            .pl-lg-3, .px-lg-3 {
                padding-left: 1rem !important
            }

            .p-lg-4 {
                padding: 1.5rem !important
            }

            .pt-lg-4, .py-lg-4 {
                padding-top: 1.5rem !important
            }

            .pr-lg-4, .px-lg-4 {
                padding-right: 1.5rem !important
            }

            .pb-lg-4, .py-lg-4 {
                padding-bottom: 1.5rem !important
            }

            .pl-lg-4, .px-lg-4 {
                padding-left: 1.5rem !important
            }

            .p-lg-5 {
                padding: 3rem !important
            }

            .pt-lg-5, .py-lg-5 {
                padding-top: 3rem !important
            }

            .pr-lg-5, .px-lg-5 {
                padding-right: 3rem !important
            }

            .pb-lg-5, .py-lg-5 {
                padding-bottom: 3rem !important
            }

            .pl-lg-5, .px-lg-5 {
                padding-left: 3rem !important
            }

            .m-lg-auto {
                margin: auto !important
            }

            .mt-lg-auto, .my-lg-auto {
                margin-top: auto !important
            }

            .mr-lg-auto, .mx-lg-auto {
                margin-right: auto !important
            }

            .mb-lg-auto, .my-lg-auto {
                margin-bottom: auto !important
            }

            .ml-lg-auto, .mx-lg-auto {
                margin-left: auto !important
            }
        }

        @media (min-width: 1200px) {
            .m-xl-0 {
                margin: 0 !important
            }

            .mt-xl-0, .my-xl-0 {
                margin-top: 0 !important
            }

            .mr-xl-0, .mx-xl-0 {
                margin-right: 0 !important
            }

            .mb-xl-0, .my-xl-0 {
                margin-bottom: 0 !important
            }

            .ml-xl-0, .mx-xl-0 {
                margin-left: 0 !important
            }

            .m-xl-1 {
                margin: .25rem !important
            }

            .mt-xl-1, .my-xl-1 {
                margin-top: .25rem !important
            }

            .mr-xl-1, .mx-xl-1 {
                margin-right: .25rem !important
            }

            .mb-xl-1, .my-xl-1 {
                margin-bottom: .25rem !important
            }

            .ml-xl-1, .mx-xl-1 {
                margin-left: .25rem !important
            }

            .m-xl-2 {
                margin: .5rem !important
            }

            .mt-xl-2, .my-xl-2 {
                margin-top: .5rem !important
            }

            .mr-xl-2, .mx-xl-2 {
                margin-right: .5rem !important
            }

            .mb-xl-2, .my-xl-2 {
                margin-bottom: .5rem !important
            }

            .ml-xl-2, .mx-xl-2 {
                margin-left: .5rem !important
            }

            .m-xl-3 {
                margin: 1rem !important
            }

            .mt-xl-3, .my-xl-3 {
                margin-top: 1rem !important
            }

            .mr-xl-3, .mx-xl-3 {
                margin-right: 1rem !important
            }

            .mb-xl-3, .my-xl-3 {
                margin-bottom: 1rem !important
            }

            .ml-xl-3, .mx-xl-3 {
                margin-left: 1rem !important
            }

            .m-xl-4 {
                margin: 1.5rem !important
            }

            .mt-xl-4, .my-xl-4 {
                margin-top: 1.5rem !important
            }

            .mr-xl-4, .mx-xl-4 {
                margin-right: 1.5rem !important
            }

            .mb-xl-4, .my-xl-4 {
                margin-bottom: 1.5rem !important
            }

            .ml-xl-4, .mx-xl-4 {
                margin-left: 1.5rem !important
            }

            .m-xl-5 {
                margin: 3rem !important
            }

            .mt-xl-5, .my-xl-5 {
                margin-top: 3rem !important
            }

            .mr-xl-5, .mx-xl-5 {
                margin-right: 3rem !important
            }

            .mb-xl-5, .my-xl-5 {
                margin-bottom: 3rem !important
            }

            .ml-xl-5, .mx-xl-5 {
                margin-left: 3rem !important
            }

            .p-xl-0 {
                padding: 0 !important
            }

            .pt-xl-0, .py-xl-0 {
                padding-top: 0 !important
            }

            .pr-xl-0, .px-xl-0 {
                padding-right: 0 !important
            }

            .pb-xl-0, .py-xl-0 {
                padding-bottom: 0 !important
            }

            .pl-xl-0, .px-xl-0 {
                padding-left: 0 !important
            }

            .p-xl-1 {
                padding: .25rem !important
            }

            .pt-xl-1, .py-xl-1 {
                padding-top: .25rem !important
            }

            .pr-xl-1, .px-xl-1 {
                padding-right: .25rem !important
            }

            .pb-xl-1, .py-xl-1 {
                padding-bottom: .25rem !important
            }

            .pl-xl-1, .px-xl-1 {
                padding-left: .25rem !important
            }

            .p-xl-2 {
                padding: .5rem !important
            }

            .pt-xl-2, .py-xl-2 {
                padding-top: .5rem !important
            }

            .pr-xl-2, .px-xl-2 {
                padding-right: .5rem !important
            }

            .pb-xl-2, .py-xl-2 {
                padding-bottom: .5rem !important
            }

            .pl-xl-2, .px-xl-2 {
                padding-left: .5rem !important
            }

            .p-xl-3 {
                padding: 1rem !important
            }

            .pt-xl-3, .py-xl-3 {
                padding-top: 1rem !important
            }

            .pr-xl-3, .px-xl-3 {
                padding-right: 1rem !important
            }

            .pb-xl-3, .py-xl-3 {
                padding-bottom: 1rem !important
            }

            .pl-xl-3, .px-xl-3 {
                padding-left: 1rem !important
            }

            .p-xl-4 {
                padding: 1.5rem !important
            }

            .pt-xl-4, .py-xl-4 {
                padding-top: 1.5rem !important
            }

            .pr-xl-4, .px-xl-4 {
                padding-right: 1.5rem !important
            }

            .pb-xl-4, .py-xl-4 {
                padding-bottom: 1.5rem !important
            }

            .pl-xl-4, .px-xl-4 {
                padding-left: 1.5rem !important
            }

            .p-xl-5 {
                padding: 3rem !important
            }

            .pt-xl-5, .py-xl-5 {
                padding-top: 3rem !important
            }

            .pr-xl-5, .px-xl-5 {
                padding-right: 3rem !important
            }

            .pb-xl-5, .py-xl-5 {
                padding-bottom: 3rem !important
            }

            .pl-xl-5, .px-xl-5 {
                padding-left: 3rem !important
            }

            .m-xl-auto {
                margin: auto !important
            }

            .mt-xl-auto, .my-xl-auto {
                margin-top: auto !important
            }

            .mr-xl-auto, .mx-xl-auto {
                margin-right: auto !important
            }

            .mb-xl-auto, .my-xl-auto {
                margin-bottom: auto !important
            }

            .ml-xl-auto, .mx-xl-auto {
                margin-left: auto !important
            }
        }

        .text-justify {
            text-align: justify !important
        }

        .text-nowrap {
            white-space: nowrap !important
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .text-left {
            text-align: left !important
        }

        .text-right {
            text-align: right !important
        }

        .text-center {
            text-align: center !important
        }

        @media (min-width: 576px) {
            .text-sm-left {
                text-align: left !important
            }

            .text-sm-right {
                text-align: right !important
            }

            .text-sm-center {
                text-align: center !important
            }
        }

        @media (min-width: 768px) {
            .text-md-left {
                text-align: left !important
            }

            .text-md-right {
                text-align: right !important
            }

            .text-md-center {
                text-align: center !important
            }
        }

        @media (min-width: 992px) {
            .text-lg-left {
                text-align: left !important
            }

            .text-lg-right {
                text-align: right !important
            }

            .text-lg-center {
                text-align: center !important
            }
        }

        @media (min-width: 1200px) {
            .text-xl-left {
                text-align: left !important
            }

            .text-xl-right {
                text-align: right !important
            }

            .text-xl-center {
                text-align: center !important
            }
        }

        .text-lowercase {
            text-transform: lowercase !important
        }

        .text-uppercase {
            text-transform: uppercase !important
        }

        .text-capitalize {
            text-transform: capitalize !important
        }

        .font-weight-light {
            font-weight: 300 !important
        }

        .font-weight-normal {
            font-weight: 400 !important
        }

        .font-weight-bold {
            font-weight: 700 !important
        }

        .font-italic {
            font-style: italic !important
        }

        .text-white {
            color: #fff !important
        }

        .text-primary {
            color: #007bff !important
        }

        a.text-primary:focus, a.text-primary:hover {
            color: #0062cc !important
        }

        .text-secondary {
            color: #868e96 !important
        }

        a.text-secondary:focus, a.text-secondary:hover {
            color: #6c757d !important
        }

        .text-success {
            color: #28a745 !important
        }

        a.text-success:focus, a.text-success:hover {
            color: #1e7e34 !important
        }

        .text-info {
            color: #17a2b8 !important
        }

        a.text-info:focus, a.text-info:hover {
            color: #117a8b !important
        }

        .text-warning {
            color: #ffc107 !important
        }

        a.text-warning:focus, a.text-warning:hover {
            color: #d39e00 !important
        }

        .text-danger {
            color: #dc3545 !important
        }

        a.text-danger:focus, a.text-danger:hover {
            color: #bd2130 !important
        }

        .text-light {
            color: #f8f9fa !important
        }

        a.text-light:focus, a.text-light:hover {
            color: #dae0e5 !important
        }

        .text-dark {
            color: #343a40 !important
        }

        a.text-dark:focus, a.text-dark:hover {
            color: #1d2124 !important
        }

        .text-muted {
            color: #868e96 !important
        }

        .text-hide {
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0
        }

        .visible {
            visibility: visible !important
        }

        .invisible {
            visibility: hidden !important
        }

        a, a:focus {
            text-decoration: none
        }

        a:focus, button:focus {
            outline: 0
        }

        .container, .container > header {
            position: relative
        }

        .form-control, .form-section {
            background-color: transparent
        }

        .form-control, .tm-btn-subscribe {
            font-weight: 300;
            font-size: 1.4rem
        }

        .fa, a, button {
            transition: .3s
        }

        .footer-link, .tm-content {
            z-index: 1001
        }

        blockquote, body, dd, div, dl, dt, fieldset, form, h1, h2, h3, h4, h5, h6, html, input, li, ol, p, pre, td, textarea, th, ul {
            margin: 0;
            padding: 0
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        abbr, acronym, fieldset, img {
            border: 0
        }

        input {
            border: 1px solid #b0b0b0;
            padding: 3px 5px 4px;
            color: #979797;
            width: 190px
        }

        .contact_email, .form-control, .form-section, a, button, h1, p {
            color: #fff
        }

        address, caption, cite, code, dfn, th, var {
            font-style: normal;
            font-weight: 400
        }

        ol, ul {
            list-style: none
        }

        caption, th {
            text-align: left
        }

        h1, h2, h3, h4, h5, h6 {
            font-size: 100%;
            font-weight: 400
        }

        q:after, q:before {
            content: ''
        }

        body {
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
            background: #000;
            font-weight: 400;
            font-size: 24px;
            overflow-x: hidden
        }

        .ie7 body {
            overflow: hidden
        }

        a:hover {
            color: #e8b43e;
            text-decoration: underline
        }

        h1 {
            font-size: 4rem
        }

        .sidebar-container {
            max-width: 680px;
            padding: 0 50px 0 0
        }

        .clr {
            clear: both
        }

        .container > header {
            padding: 30px 30px 10px 20px;
            margin: 0 20px 10px;
            display: block;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, .2);
            text-align: left
        }

        #particles-js, .cb-slideshow li, .footer-link {
            position: absolute;
            left: 0
        }

        .container > header h1 {
            font-family: BebasNeueRegular, 'Arial Narrow', Arial, sans-serif;
            font-size: 35px;
            line-height: 35px;
            position: relative;
            font-weight: 400;
            color: #fff;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, .3);
            padding: 0 0 5px
        }

        .container > header h2, p.info {
            font-size: 16px;
            font-style: italic;
            color: #f8f8f8;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, .6)
        }

        #particles-js {
            top: 0;
            z-index: 1000;
            width: 100%;
            height: 98%
        }

        .cb-slideshow-text-container {
            height: 100vh;
            display: flex;
            align-items: center
        }

        .tm-btn-subscribe {
            background-color: #313131;
            border-radius: .5rem;
            border-color: #fff;
            padding: .75rem 1.6rem;
            cursor: pointer;
            transition: .3s
        }

        .tm-btn-subscribe:hover {
            background-color: #404040
        }

        .tm-social-icons-container {
            margin: 30px 0
        }

        .tm-social-link {
            display: inline-block;
            width: 50px;
            text-align: center;
        }

        .tm-social-link svg {
            transition: .3s;
            margin: 0 8px
        }

        .tm-social-link svg:hover {

        .fill-ffffff {
            fill: #404040;
        }

        .fill-333333 {
            fill: #e8b43e;
        }

        }

        .footer-link {
            margin: 0 0 20px;
            font-size: 18px;
            bottom: 0;
            color: #fff;
            text-align: center;
            width: 100%
        }

        .cb-slideshow, .cb-slideshow:after {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0
        }

        .cb-slideshow li {
            width: 100%;
            height: 100%;
            top: 0;
            color: transparent;
            background: 50% 50% none;
            opacity: 0;
            z-index: 0;
            -webkit-backface-visibility: hidden;
            -webkit-animation: 72s linear infinite imageAnimation;
            -moz-animation: 72s linear infinite imageAnimation;
            -o-animation: 72s linear infinite imageAnimation;
            -ms-animation: imageAnimation 72s linear infinite 0s;
            animation: 72s linear infinite imageAnimation
        }

        .cb-slideshow li:first-child {
            background-color: #313131
        }

        .cb-slideshow li:nth-child(2) {
            background-color: #10354f;
            -webkit-animation-delay: 12s;
            -moz-animation-delay: 12s;
            -o-animation-delay: 12s;
            -ms-animation-delay: 12s;
            animation-delay: 12s
        }

        .cb-slideshow li:nth-child(3) {
            background-color: #541a1a;
            -webkit-animation-delay: 24s;
            -moz-animation-delay: 24s;
            -o-animation-delay: 24s;
            -ms-animation-delay: 24s;
            animation-delay: 24s
        }

        .cb-slideshow li:nth-child(4) {
            background-color: #584020;
            animation-delay: 36s
        }

        .cb-slideshow li:nth-child(5) {
            background-color: #102b09;
            animation-delay: 48s
        }

        .cb-slideshow li:nth-child(6) {
            background-color: #340b2f;
            animation-delay: 60s
        }

        @keyframes imageAnimation {
            0% {
                opacity: 0;
                animation-timing-function: ease-in
            }
            8% {
                opacity: 1;
                transform: scale(1.15);
                animation-timing-function: ease-out
            }
            17% {
                opacity: 1;
                transform: scale(1.2)
            }
            25% {
                opacity: 0;
                transform: scale(1.4)
            }
            100% {
                opacity: 0
            }
        }

        @media screen and (max-width: 1140px) {
            .cb-slideshow li div h3 {
                font-size: 140px
            }
        }

        @media screen and (max-width: 767px) {
            .container > header {
                text-align: center
            }
        }

        @media screen and (max-width: 600px) {
            .cb-slideshow li div h3 {
                font-size: 80px
            }

            .tm-content {
                margin-top: 80px
            }
        }

        @media screen and (max-width: 576px) {
            .sidebar-container {
                padding: 0
            }

            .cb-slideshow li div h3 {
                font-size: 80px
            }

            .tm-btn-subscribe {
                margin-top: 20px
            }

            .form-section, .tm-social-icons-container {
                text-align: center
            }
        }
    </style>
    <script>
        window.Modernizr = function (a, b, c) {
            function A(a, b) {
                var c = a.charAt(0).toUpperCase() + a.substr(1), d = (a + " " + n.join(c + " ") + c).split(" ");
                return z(d, b)
            }

            function z(a, b) {
                for (var d in a) if (k[a[d]] !== c) return b == "pfx" ? a[d] : !0;
                return !1
            }

            function y(a, b) {
                return !!~("" + a).indexOf(b)
            }

            function x(a, b) {
                return typeof a === b
            }

            function w(a, b) {
                return v(prefixes.join(a + ";") + (b || ""))
            }

            function v(a) {
                k.cssText = a
            }

            var d = "2.0.6", e = {}, f = !0, g = b.documentElement, h = b.head || b.getElementsByTagName("head")[0],
                i = "modernizr", j = b.createElement(i), k = j.style, l, m = Object.prototype.toString,
                n = "Webkit Moz O ms Khtml".split(" "), o = {}, p = {}, q = {}, r = [], s, t = {}.hasOwnProperty, u;
            !x(t, c) && !x(t.call, c) ? u = function (a, b) {
                return t.call(a, b)
            } : u = function (a, b) {
                return b in a && x(a.constructor.prototype[b], c)
            }, o.cssanimations = function () {
                return A("animationName")
            };
            for (var B in o) u(o, B) && (s = B.toLowerCase(), e[s] = o[B](), r.push((e[s] ? "" : "no-") + s));
            v(""), j = l = null, a.attachEvent && function () {
                var a = b.createElement("div");
                a.innerHTML = "<elem></elem>";
                return a.childNodes.length !== 1
            }() && function (a, b) {
                function s(a) {
                    var b = -1;
                    while (++b < g) a.createElement(f[b])
                }

                a.iepp = a.iepp || {};
                var d = a.iepp,
                    e = d.html5elements || "abbr|article|aside|audio|canvas|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
                    f = e.split("|"), g = f.length, h = new RegExp("(^|\\s)(" + e + ")", "gi"),
                    i = new RegExp("<(/*)(" + e + ")", "gi"), j = /^\s*[\{\}]\s*$/,
                    k = new RegExp("(^|[^\\n]*?\\s)(" + e + ")([^\\n]*)({[\\n\\w\\W]*?})", "gi"),
                    l = b.createDocumentFragment(), m = b.documentElement, n = m.firstChild,
                    o = b.createElement("body"), p = b.createElement("style"), q = /print|all/, r;
                d.getCSS = function (a, b) {
                    if (a + "" === c) return "";
                    var e = -1, f = a.length, g, h = [];
                    while (++e < f) {
                        g = a[e];
                        if (g.disabled) continue;
                        b = g.media || b, q.test(b) && h.push(d.getCSS(g.imports, b), g.cssText), b = "all"
                    }
                    return h.join("")
                }, d.parseCSS = function (a) {
                    var b = [], c;
                    while ((c = k.exec(a)) != null) b.push(((j.exec(c[1]) ? "\n" : c[1]) + c[2] + c[3]).replace(h, "$1.iepp_$2") + c[4]);
                    return b.join("\n")
                }, d.writeHTML = function () {
                    var a = -1;
                    r = r || b.body;
                    while (++a < g) {
                        var c = b.getElementsByTagName(f[a]), d = c.length, e = -1;
                        while (++e < d) c[e].className.indexOf("iepp_") < 0 && (c[e].className += " iepp_" + f[a])
                    }
                    l.appendChild(r), m.appendChild(o), o.className = r.className, o.id = r.id, o.innerHTML = r.innerHTML.replace(i, "<$1font")
                }, d._beforePrint = function () {
                    p.styleSheet.cssText = d.parseCSS(d.getCSS(b.styleSheets, "all")), d.writeHTML()
                }, d.restoreHTML = function () {
                    o.innerHTML = "", m.removeChild(o), m.appendChild(r)
                }, d._afterPrint = function () {
                    d.restoreHTML(), p.styleSheet.cssText = ""
                }, s(b), s(l);
                d.disablePP || (n.insertBefore(p, n.firstChild), p.media = "print", p.className = "iepp-printshim", a.attachEvent("onbeforeprint", d._beforePrint), a.attachEvent("onafterprint", d._afterPrint))
            }(a, b), e._version = d, e._domPrefixes = n, e.testProp = function (a) {
                return z([a])
            }, e.testAllProps = A, g.className = g.className.replace(/\bno-js\b/, "") + (f ? " js " + r.join(" ") : "");
            return e
        }(this, this.document), function (a, b, c) {
            function k(a) {
                return !a || a == "loaded" || a == "complete"
            }

            function j() {
                var a = 1, b = -1;
                while (p.length - ++b) if (p[b].s && !(a = p[b].r)) break;
                a && g()
            }

            function i(a) {
                var c = b.createElement("script"), d;
                c.src = a.s, c.onreadystatechange = c.onload = function () {
                    !d && k(c.readyState) && (d = 1, j(), c.onload = c.onreadystatechange = null)
                }, m(function () {
                    d || (d = 1, j())
                }, H.errorTimeout), a.e ? c.onload() : n.parentNode.insertBefore(c, n)
            }

            function h(a) {
                var c = b.createElement("link"), d;
                c.href = a.s, c.rel = "stylesheet", c.type = "text/css";
                if (!a.e && (w || r)) {
                    var e = function (a) {
                        m(function () {
                            if (!d) try {
                                a.sheet.cssRules.length ? (d = 1, j()) : e(a)
                            } catch (b) {
                                b.code == 1e3 || b.message == "security" || b.message == "denied" ? (d = 1, m(function () {
                                    j()
                                }, 0)) : e(a)
                            }
                        }, 0)
                    };
                    e(c)
                } else c.onload = function () {
                    d || (d = 1, m(function () {
                        j()
                    }, 0))
                }, a.e && c.onload();
                m(function () {
                    d || (d = 1, j())
                }, H.errorTimeout), !a.e && n.parentNode.insertBefore(c, n)
            }

            function g() {
                var a = p.shift();
                q = 1, a ? a.t ? m(function () {
                    a.t == "c" ? h(a) : i(a)
                }, 0) : (a(), j()) : q = 0
            }

            function f(a, c, d, e, f, h) {
                function i() {
                    !o && k(l.readyState) && (r.r = o = 1, !q && j(), l.onload = l.onreadystatechange = null, m(function () {
                        u.removeChild(l)
                    }, 0))
                }

                var l = b.createElement(a), o = 0, r = {t: d, s: c, e: h};
                l.src = l.data = c, !s && (l.style.display = "none"), l.width = l.height = "0", a != "object" && (l.type = d), l.onload = l.onreadystatechange = i, a == "img" ? l.onerror = i : a == "script" && (l.onerror = function () {
                    r.e = r.r = 1, g()
                }), p.splice(e, 0, r), u.insertBefore(l, s ? null : n), m(function () {
                    o || (u.removeChild(l), r.r = r.e = o = 1, j())
                }, H.errorTimeout)
            }

            function e(a, b, c) {
                var d = b == "c" ? z : y;
                q = 0, b = b || "j", C(a) ? f(d, a, b, this.i++, l, c) : (p.splice(this.i++, 0, a), p.length == 1 && g());
                return this
            }

            function d() {
                var a = H;
                a.loader = {load: e, i: 0};
                return a
            }

            var l = b.documentElement, m = a.setTimeout, n = b.getElementsByTagName("script")[0], o = {}.toString,
                p = [], q = 0, r = "MozAppearance" in l.style, s = r && !!b.createRange().compareNode, t = r && !s,
                u = s ? l : n.parentNode, v = a.opera && o.call(a.opera) == "[object Opera]",
                w = "webkitAppearance" in l.style, x = w && "async" in b.createElement("script"),
                y = r ? "object" : v || x ? "img" : "script", z = w ? "img" : y, A = Array.isArray || function (a) {
                    return o.call(a) == "[object Array]"
                }, B = function (a) {
                    return Object(a) === a
                }, C = function (a) {
                    return typeof a == "string"
                }, D = function (a) {
                    return o.call(a) == "[object Function]"
                }, E = [], F = {}, G, H;
            H = function (a) {
                function f(a) {
                    var b = a.split("!"), c = E.length, d = b.pop(), e = b.length,
                        f = {url: d, origUrl: d, prefixes: b}, g, h;
                    for (h = 0; h < e; h++) g = F[b[h]], g && (f = g(f));
                    for (h = 0; h < c; h++) f = E[h](f);
                    return f
                }

                function e(a, b, e, g, h) {
                    var i = f(a), j = i.autoCallback;
                    if (!i.bypass) {
                        b && (b = D(b) ? b : b[a] || b[g] || b[a.split("/").pop().split("?")[0]]);
                        if (i.instead) return i.instead(a, b, e, g, h);
                        e.load(i.url, i.forceCSS || !i.forceJS && /css$/.test(i.url) ? "c" : c, i.noexec), (D(b) || D(j)) && e.load(function () {
                            d(), b && b(i.origUrl, h, g), j && j(i.origUrl, h, g)
                        })
                    }
                }

                function b(a, b) {
                    function c(a) {
                        if (C(a)) e(a, h, b, 0, d); else if (B(a)) for (i in a) a.hasOwnProperty(i) && e(a[i], h, b, i, d)
                    }

                    var d = !!a.test, f = d ? a.yep : a.nope, g = a.load || a.both, h = a.callback, i;
                    c(f), c(g), a.complete && b.load(a.complete)
                }

                var g, h, i = this.yepnope.loader;
                if (C(a)) e(a, 0, i, 0); else if (A(a)) for (g = 0; g < a.length; g++) h = a[g], C(h) ? e(h, 0, i, 0) : A(h) ? H(h) : B(h) && b(h, i); else B(a) && b(a, i)
            }, H.addPrefix = function (a, b) {
                F[a] = b
            }, H.addFilter = function (a) {
                E.push(a)
            }, H.errorTimeout = 1e4, b.readyState == null && b.addEventListener && (b.readyState = "loading", b.addEventListener("DOMContentLoaded", G = function () {
                b.removeEventListener("DOMContentLoaded", G, 0), b.readyState = "complete"
            }, 0)), a.yepnope = d()
        }(this, this.document), Modernizr.load = function () {
            yepnope.apply(window, [].slice.call(arguments, 0))
        };
    </script>
</head>

<body>

<div id="particles-js"></div>

<ul class="cb-slideshow">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>

<div class="container-fluid">
    <div class="row cb-slideshow-text-container ">
        <div class="tm-content col-xl-6 col-sm-8 col-xs-8 ml-auto section">
            <div class="sidebar-container">
                <header class="mb-5">
                    <a href="<?php home_url(); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             viewBox="0 0 380.34 67.37">
                            <defs>
                                <style>.cls-1 {
                                        fill: #e8b43e;
                                    }

                                    .cls-2 {
                                        fill: #f6f6f6;
                                    }

                                    .cls-3 {
                                        fill: url(#Gradient_49);
                                    }</style>
                                <linearGradient id="Gradient_49" x1="16.22" y1="633.36" x2="5.36" y2="652.16"
                                                gradientTransform="translate(0 -587.5)" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#dfaf42"/>
                                    <stop offset="0.38" stop-color="#dda340"/>
                                    <stop offset="0.67" stop-color="#da8e3d"/>
                                    <stop offset="0.89" stop-color="#cc6037"/>
                                    <stop offset="1" stop-color="#c43632"/>
                                </linearGradient>
                            </defs>
                            <path class="cls-1"
                                  d="M76.7,54,64.58,6.27H71.1l5.67,24.16c1.42,6,2.69,11.9,3.54,16.5h.14c.78-4.74,2.27-10.41,3.9-16.57L90.73,6.27h6.44L103,30.5c1.35,5.67,2.63,11.33,3.33,16.36h.15c1-5.24,2.33-10.55,3.82-16.5l6.31-24.09h6.3L109.36,54h-6.45l-6-24.87a144,144,0,0,1-3.12-15.58h-.14A149.42,149.42,0,0,1,90,29.15L83.15,54Z"/>
                            <path class="cls-1"
                                  d="M129.76,38c.14,8.43,5.53,11.9,11.76,11.9a22.59,22.59,0,0,0,9.5-1.77l1.06,4.46a27.81,27.81,0,0,1-11.41,2.13c-10.55,0-16.86-6.94-16.86-17.29S129.9,19,139.89,19c11.2,0,14.17,9.85,14.17,16.15a23.86,23.86,0,0,1-.21,2.91ZM148,33.55c.07-4-1.63-10.14-8.64-10.14-6.31,0-9.07,5.81-9.57,10.14Z"/>
                            <path class="cls-1"
                                  d="M161.5,54c.14-2.34.28-5.81.28-8.86V3.72H168V25.26h.14c2.19-3.83,6.16-6.31,11.69-6.31,8.5,0,14.52,7.09,14.45,17.5,0,12.26-7.72,18.35-15.37,18.35-5,0-8.93-1.91-11.48-6.45h-.21L166.88,54ZM168,40.28a11.84,11.84,0,0,0,.28,2.26,9.62,9.62,0,0,0,9.35,7.3c6.52,0,10.42-5.31,10.42-13.18,0-6.87-3.55-12.75-10.21-12.75a9.94,9.94,0,0,0-9.49,7.65,12.46,12.46,0,0,0-.35,2.55Z"/>
                            <path class="cls-2" d="M202.3,6.27h6.17V48.85h20.4V54H202.3Z"/>
                            <path class="cls-2"
                                  d="M265.57,36.59c0,12.68-8.79,18.21-17.08,18.21-9.28,0-16.43-6.8-16.43-17.64,0-11.48,7.51-18.21,17-18.21C258.91,19,265.57,26.11,265.57,36.59ZM238.36,37c0,7.51,4.33,13.17,10.42,13.17s10.41-5.59,10.41-13.32c0-5.81-2.9-13.17-10.27-13.17S238.36,30.43,238.36,37Z"/>
                            <path class="cls-2"
                                  d="M273.43,30.43c0-4-.07-7.51-.28-10.7h5.45l.22,6.73h.28c1.56-4.6,5.31-7.51,9.49-7.51a6.77,6.77,0,0,1,1.77.21V25a9.38,9.38,0,0,0-2.12-.21c-4.39,0-7.51,3.33-8.36,8a17.66,17.66,0,0,0-.29,2.9V54h-6.16Z"/>
                            <path class="cls-2"
                                  d="M299.36,38c.14,8.43,5.53,11.9,11.76,11.9a22.54,22.54,0,0,0,9.49-1.77l1.07,4.46a27.81,27.81,0,0,1-11.41,2.13c-10.56,0-16.86-6.94-16.86-17.29S299.5,19,309.49,19c11.2,0,14.17,9.85,14.17,16.15a23.86,23.86,0,0,1-.21,2.91Zm18.28-4.46c.07-4-1.63-10.14-8.64-10.14-6.31,0-9.07,5.81-9.57,10.14Z"/>
                            <path class="cls-2"
                                  d="M331.38,29c0-3.54-.07-6.45-.28-9.28h5.45l.29,5.53h.21A11.82,11.82,0,0,1,347.82,19a10.12,10.12,0,0,1,9.7,6.87h.15a14,14,0,0,1,3.82-4.46A11.7,11.7,0,0,1,369.07,19c4.54,0,11.27,3,11.27,14.88V54h-6.1V34.61c0-6.59-2.41-10.56-7.44-10.56a8.06,8.06,0,0,0-7.36,5.67,10,10,0,0,0-.5,3.12V54h-6.09V33.47c0-5.45-2.41-9.42-7.16-9.42-3.89,0-6.73,3.12-7.72,6.24a8.66,8.66,0,0,0-.5,3V54h-6.09Z"/>
                            <circle class="cls-3" cx="10.77" cy="55.3" r="10.77"/>
                            <path class="cls-2"
                                  d="M46.38,36.06h0c-.61-.08-2.22-.17-2.26-.18-2.7-.18-4.55-1.83-4.4-4.4a21.57,21.57,0,0,1,1.1-3.58l.08-.16h0a19.77,19.77,0,1,0-18.1,11.81c1.15,0,3.09-.23,3.54-.23a4,4,0,0,1,4.2,4.12,9.79,9.79,0,0,1-.68,2.6h0a15.91,15.91,0,0,0-1,5.61,15.73,15.73,0,0,0,31.45,0A16,16,0,0,0,46.38,36.06Z"/>
                        </svg>
                    </a>
                </header>
                <p class="mb-5">
					<?php esc_html_e( 'A starter WordPress theme for creating websites.', THEME_DOMAIN ); ?>
                </p>
                <div class="row form-section">
                    <div class="col-md-7 col-sm-7 col-xs-7">
                        <a href="<?php echo current_user_can( 'administrator' ) ? esc_url( admin_url( 'options-reading.php' ) ) : esc_url( wp_login_url() ); ?>"
                           class="btn tm-btn-subscribe">
							<?php esc_html_e( 'Go to theme settings', THEME_DOMAIN ); ?>
                        </a>
                    </div>
                </div>
                <div class="tm-social-icons-container text-xs-center">
                    <a href="https://weblorem.com" target="_blank" class="tm-social-link">
                        <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path
                                    d="M16 31.625C7.385 31.625.375 24.615.375 16 .375 7.384 7.385.375 16 .375S31.625 7.384 31.625 16c0 8.615-7.01 15.625-15.625 15.625z"
                                    fill="#313131" class="fill-ffffff"></path>
                            <path d="M16 .75C24.409.75 31.25 7.591 31.25 16S24.409 31.25 16 31.25.75 24.409.75 16 7.591.75 16 .75M16 0C7.163 0 0 7.163 0 16c0 8.836 7.163 16 16 16s16-7.164 16-16c0-8.837-7.163-16-16-16z"
                                  fill="#ffffff" class="fill-e5e5e5"></path>
                            <g fill="#ffffff" class="fill-333333">
                                <path d="m4.905 13.267.436 2.236c.111.57.223 1.174.313 1.8h.022c.112-.626.269-1.252.402-1.789l.582-2.247h1.342l.547 2.18c.146.615.291 1.23.403 1.856h.022c.078-.626.19-1.241.313-1.867l.47-2.169h1.666l-1.678 5.467H8.147l-.515-1.924a20.368 20.368 0 0 1-.346-1.699h-.022a12.731 12.731 0 0 1-.358 1.699l-.548 1.923H4.76l-1.588-5.467h1.733zM13.608 13.267l.436 2.236c.111.57.223 1.174.313 1.8h.022c.112-.626.269-1.252.402-1.789l.582-2.247h1.342l.547 2.18c.146.615.291 1.23.403 1.856h.022c.078-.626.19-1.241.313-1.867l.47-2.169h1.666l-1.678 5.467H16.85l-.514-1.923a20.368 20.368 0 0 1-.346-1.699h-.023a12.731 12.731 0 0 1-.358 1.699l-.548 1.923h-1.598l-1.588-5.467h1.733zM22.31 13.267l.436 2.236c.111.57.223 1.174.313 1.8h.022c.112-.626.269-1.252.402-1.789l.582-2.247h1.342l.547 2.18c.146.615.291 1.23.403 1.856h.022c.078-.626.19-1.241.313-1.867l.47-2.169h1.666l-1.678 5.467h-1.598l-.514-1.923a20.368 20.368 0 0 1-.346-1.699h-.023a12.731 12.731 0 0 1-.358 1.699l-.548 1.923h-1.598l-1.588-5.467h1.733z"></path>
                            </g></svg>
                    </a>
                    <a href="#" target="_blank" class="tm-social-link">
                        <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path
                                    d="M16 31.625C7.384 31.625.375 24.615.375 16 .375 7.384 7.384.375 16 .375 24.615.375 31.625 7.384 31.625 16c0 8.615-7.01 15.625-15.625 15.625z"
                                    fill="#313131" class="fill-ffffff"></path>
                            <path d="M16 .75C24.409.75 31.25 7.591 31.25 16S24.409 31.25 16 31.25.75 24.409.75 16 7.591.75 16 .75M16 0C7.163 0 0 7.163 0 16c0 8.836 7.163 16 16 16s16-7.164 16-16c0-8.837-7.163-16-16-16z"
                                  fill="#ffffff" class="fill-e5e5e5"></path>
                            <path d="M13.69 24.903h3.679v-8.904h2.454l.325-3.068h-2.779l.004-1.536c0-.8.076-1.229 1.224-1.229h1.534V7.097h-2.455c-2.949 0-3.986 1.489-3.986 3.992v1.842h-1.838V16h1.838v8.903z"
                                  fill="#ffffff" class="fill-333333"></path></svg>
                    </a>
                    <a href="https://www.linkedin.com/company/weblorem" target="_blank" class="tm-social-link">
                        <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path
                                    d="M16.005 31.614C7.39 31.614.38 24.604.38 15.989S7.39.364 16.005.364 31.63 7.374 31.63 15.989s-7.01 15.625-15.625 15.625z"
                                    fill="#313131" class="fill-ffffff"></path>
                            <path d="M16.005.739c8.409 0 15.25 6.841 15.25 15.25s-6.841 15.25-15.25 15.25S.755 24.398.755 15.989 7.596.739 16.005.739m0-.75c-8.837 0-16 7.163-16 16 0 8.836 7.163 16 16 16s16-7.164 16-16-7.163-16-16-16z"
                                  fill="#ffffff" class="fill-e5e5e5"></path>
                            <path d="M24.299 22.932v-6.137c0-3.288-1.755-4.818-4.096-4.818-1.889 0-2.735 1.039-3.206 1.768v-1.517h-3.558c.047 1.005 0 10.704 0 10.704h3.558v-5.978c0-.319.023-.639.117-.867.257-.639.842-1.301 1.825-1.301 1.288 0 1.803.981 1.803 2.42v5.727l3.557-.001zM9.69 10.767c1.24 0 2.013-.823 2.013-1.85-.023-1.05-.773-1.849-1.99-1.849s-2.012.798-2.012 1.848c0 1.028.772 1.85 1.967 1.85h.022zm1.779 12.165V12.228H7.912v10.704h3.557z"
                                  fill="#ffffff" class="fill-333333"></path></svg>
                    </a>
                    <a href="mailto:info@weblorem.com" class="tm-social-link">
                        <svg viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path
                                    d="M16 31.625C7.384 31.625.375 24.615.375 16 .375 7.384 7.384.375 16 .375 24.615.375 31.625 7.384 31.625 16c0 8.615-7.01 15.625-15.625 15.625z"
                                    fill="#313131" class="fill-ffffff"></path>
                            <path d="M16 .75C24.409.75 31.25 7.591 31.25 16S24.409 31.25 16 31.25.75 24.409.75 16 7.591.75 16 .75M16 0C7.163 0 0 7.163 0 16c0 8.836 7.163 16 16 16s16-7.164 16-16c0-8.837-7.163-16-16-16z"
                                  fill="#ffffff" class="fill-e5e5e5"></path>
                            <g fill="#ffffff" class="fill-333333">
                                <path d="m6.518 21.815 5.189-6.524-5.189-3.172zM19.5 15.746l-3.511 2.162-3.517-2.15L7.11 22.5h17.757z"></path>
                                <path d="m15.988 16.864 9.494-5.847V9.5H6.518v1.576zM20.263 15.276l5.219 6.567v-9.781z"></path>
                            </g></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-link">
        <p>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.',
				THEME_DOMAIN ),
				THEME_NAME,
				'<a href="https://weblorem.com">Eugene Mazuryk</a>'
			); ?>
        </p>
        <p>© 2020-<?= date( 'Y' ) ?> WebLorem</p>
    </div>
</div>
<script>
    var pJS = function (e, i) {
        var t = document.querySelector("#" + e + " > .particles-js-canvas-el");
        this.pJS = {
            canvas: {el: t, w: t.offsetWidth, h: t.offsetHeight},
            particles: {
                number: {value: 400, density: {enable: !0, value_area: 800}},
                color: {value: "#fff"},
                shape: {
                    type: "circle",
                    stroke: {width: 0, color: "#ff0000"},
                    polygon: {nb_sides: 5},
                    image: {src: "", width: 100, height: 100}
                },
                opacity: {value: 1, random: !1, anim: {enable: !1, speed: 2, opacity_min: 0, sync: !1}},
                size: {value: 20, random: !1, anim: {enable: !1, speed: 20, size_min: 0, sync: !1}},
                line_linked: {enable: !0, distance: 100, color: "#fff", opacity: 1, width: 1},
                move: {
                    enable: !0,
                    speed: 2,
                    direction: "none",
                    random: !1,
                    straight: !1,
                    out_mode: "out",
                    bounce: !1,
                    attract: {enable: !1, rotateX: 3e3, rotateY: 3e3}
                },
                array: []
            },
            interactivity: {
                detect_on: "canvas",
                events: {onhover: {enable: !0, mode: "grab"}, onclick: {enable: !0, mode: "push"}, resize: !0},
                modes: {
                    grab: {distance: 100, line_linked: {opacity: 1}},
                    bubble: {distance: 200, size: 80, duration: .4},
                    repulse: {distance: 200, duration: .4},
                    push: {particles_nb: 4},
                    remove: {particles_nb: 2}
                },
                mouse: {}
            },
            retina_detect: !1,
            fn: {interact: {}, modes: {}, vendors: {}},
            tmp: {}
        };
        var a = this.pJS;
        i && Object.deepExtend(a, i), a.tmp.obj = {
            size_value: a.particles.size.value,
            size_anim_speed: a.particles.size.anim.speed,
            move_speed: a.particles.move.speed,
            line_linked_distance: a.particles.line_linked.distance,
            line_linked_width: a.particles.line_linked.width,
            mode_grab_distance: a.interactivity.modes.grab.distance,
            mode_bubble_distance: a.interactivity.modes.bubble.distance,
            mode_bubble_size: a.interactivity.modes.bubble.size,
            mode_repulse_distance: a.interactivity.modes.repulse.distance
        }, a.fn.retinaInit = function () {
            a.retina_detect && window.devicePixelRatio > 1 ? (a.canvas.pxratio = window.devicePixelRatio, a.tmp.retina = !0) : (a.canvas.pxratio = 1, a.tmp.retina = !1), a.canvas.w = a.canvas.el.offsetWidth * a.canvas.pxratio, a.canvas.h = a.canvas.el.offsetHeight * a.canvas.pxratio, a.particles.size.value = a.tmp.obj.size_value * a.canvas.pxratio, a.particles.size.anim.speed = a.tmp.obj.size_anim_speed * a.canvas.pxratio, a.particles.move.speed = a.tmp.obj.move_speed * a.canvas.pxratio, a.particles.line_linked.distance = a.tmp.obj.line_linked_distance * a.canvas.pxratio, a.interactivity.modes.grab.distance = a.tmp.obj.mode_grab_distance * a.canvas.pxratio, a.interactivity.modes.bubble.distance = a.tmp.obj.mode_bubble_distance * a.canvas.pxratio, a.particles.line_linked.width = a.tmp.obj.line_linked_width * a.canvas.pxratio, a.interactivity.modes.bubble.size = a.tmp.obj.mode_bubble_size * a.canvas.pxratio, a.interactivity.modes.repulse.distance = a.tmp.obj.mode_repulse_distance * a.canvas.pxratio
        }, a.fn.canvasInit = function () {
            a.canvas.ctx = a.canvas.el.getContext("2d")
        }, a.fn.canvasSize = function () {
            a.canvas.el.width = a.canvas.w, a.canvas.el.height = a.canvas.h, a && a.interactivity.events.resize && window.addEventListener("resize", function () {
                a.canvas.w = a.canvas.el.offsetWidth, a.canvas.h = a.canvas.el.offsetHeight, a.tmp.retina && (a.canvas.w *= a.canvas.pxratio, a.canvas.h *= a.canvas.pxratio), a.canvas.el.width = a.canvas.w, a.canvas.el.height = a.canvas.h, a.particles.move.enable || (a.fn.particlesEmpty(), a.fn.particlesCreate(), a.fn.particlesDraw(), a.fn.vendors.densityAutoParticles()), a.fn.vendors.densityAutoParticles()
            })
        }, a.fn.canvasPaint = function () {
            a.canvas.ctx.fillRect(0, 0, a.canvas.w, a.canvas.h)
        }, a.fn.canvasClear = function () {
            a.canvas.ctx.clearRect(0, 0, a.canvas.w, a.canvas.h)
        }, a.fn.particle = function (e, i, t) {
            if (this.radius = (a.particles.size.random ? Math.random() : 1) * a.particles.size.value, a.particles.size.anim.enable && (this.size_status = !1, this.vs = a.particles.size.anim.speed / 100, a.particles.size.anim.sync || (this.vs = this.vs * Math.random())), this.x = t ? t.x : Math.random() * a.canvas.w, this.y = t ? t.y : Math.random() * a.canvas.h, this.x > a.canvas.w - 2 * this.radius ? this.x = this.x - this.radius : this.x < 2 * this.radius && (this.x = this.x + this.radius), this.y > a.canvas.h - 2 * this.radius ? this.y = this.y - this.radius : this.y < 2 * this.radius && (this.y = this.y + this.radius), a.particles.move.bounce && a.fn.vendors.checkOverlap(this, t), this.color = {}, "object" == typeof e.value) {
                if (e.value instanceof Array) {
                    var s = e.value[Math.floor(Math.random() * a.particles.color.value.length)];
                    this.color.rgb = hexToRgb(s)
                } else void 0 != e.value.r && void 0 != e.value.g && void 0 != e.value.b && (this.color.rgb = {
                    r: e.value.r,
                    g: e.value.g,
                    b: e.value.b
                }), void 0 != e.value.h && void 0 != e.value.s && void 0 != e.value.l && (this.color.hsl = {
                    h: e.value.h,
                    s: e.value.s,
                    l: e.value.l
                })
            } else "random" == e.value ? this.color.rgb = {
                r: Math.floor(256 * Math.random()) + 0,
                g: Math.floor(256 * Math.random()) + 0,
                b: Math.floor(256 * Math.random()) + 0
            } : "string" == typeof e.value && (this.color = e, this.color.rgb = hexToRgb(this.color.value));
            this.opacity = (a.particles.opacity.random ? Math.random() : 1) * a.particles.opacity.value, a.particles.opacity.anim.enable && (this.opacity_status = !1, this.vo = a.particles.opacity.anim.speed / 100, a.particles.opacity.anim.sync || (this.vo = this.vo * Math.random()));
            var r = {};
            switch (a.particles.move.direction) {
                case"top":
                    r = {x: 0, y: -1};
                    break;
                case"top-right":
                    r = {x: .5, y: -.5};
                    break;
                case"right":
                    r = {x: 1, y: -0};
                    break;
                case"bottom-right":
                    r = {x: .5, y: .5};
                    break;
                case"bottom":
                    r = {x: 0, y: 1};
                    break;
                case"bottom-left":
                    r = {x: -.5, y: 1};
                    break;
                case"left":
                    r = {x: -1, y: 0};
                    break;
                case"top-left":
                    r = {x: -.5, y: -.5};
                    break;
                default:
                    r = {x: 0, y: 0}
            }
            a.particles.move.straight ? (this.vx = r.x, this.vy = r.y, a.particles.move.random && (this.vx = this.vx * Math.random(), this.vy = this.vy * Math.random())) : (this.vx = r.x + Math.random() - .5, this.vy = r.y + Math.random() - .5), this.vx_i = this.vx, this.vy_i = this.vy;
            var n = a.particles.shape.type;
            if ("object" == typeof n) {
                if (n instanceof Array) {
                    var c = n[Math.floor(Math.random() * n.length)];
                    this.shape = c
                }
            } else this.shape = n;
            if ("image" == this.shape) {
                var o = a.particles.shape;
                this.img = {
                    src: o.image.src,
                    ratio: o.image.width / o.image.height
                }, this.img.ratio || (this.img.ratio = 1), "svg" == a.tmp.img_type && void 0 != a.tmp.source_svg && (a.fn.vendors.createSvgImg(this), a.tmp.pushing && (this.img.loaded = !1))
            }
        }, a.fn.particle.prototype.draw = function () {
            if (void 0 != this.radius_bubble) var e = this.radius_bubble; else var e = this.radius;
            if (void 0 != this.opacity_bubble) var i = this.opacity_bubble; else var i = this.opacity;
            if (this.color.rgb) var t = "rgba(" + this.color.rgb.r + "," + this.color.rgb.g + "," + this.color.rgb.b + "," + i + ")"; else var t = "hsla(" + this.color.hsl.h + "," + this.color.hsl.s + "%," + this.color.hsl.l + "%," + i + ")";
            switch (a.canvas.ctx.fillStyle = t, a.canvas.ctx.beginPath(), this.shape) {
                case"circle":
                    a.canvas.ctx.arc(this.x, this.y, e, 0, 2 * Math.PI, !1);
                    break;
                case"edge":
                    a.canvas.ctx.rect(this.x - e, this.y - e, 2 * e, 2 * e);
                    break;
                case"triangle":
                    a.fn.vendors.drawShape(a.canvas.ctx, this.x - e, this.y + e / 1.66, 2 * e, 3, 2);
                    break;
                case"polygon":
                    a.fn.vendors.drawShape(a.canvas.ctx, this.x - e / (a.particles.shape.polygon.nb_sides / 3.5), this.y - e / .76, 2.66 * e / (a.particles.shape.polygon.nb_sides / 3), a.particles.shape.polygon.nb_sides, 1);
                    break;
                case"star":
                    a.fn.vendors.drawShape(a.canvas.ctx, this.x - 2 * e / (a.particles.shape.polygon.nb_sides / 4), this.y - e / 1.52, 5.32 * e / (a.particles.shape.polygon.nb_sides / 3), a.particles.shape.polygon.nb_sides, 2);
                    break;
                case"image":
                    if ("svg" == a.tmp.img_type) var s = this.img.obj; else var s = a.tmp.img_obj;
                    s && a.canvas.ctx.drawImage(s, this.x - e, this.y - e, 2 * e, 2 * e / this.img.ratio)
            }
            a.canvas.ctx.closePath(), a.particles.shape.stroke.width > 0 && (a.canvas.ctx.strokeStyle = a.particles.shape.stroke.color, a.canvas.ctx.lineWidth = a.particles.shape.stroke.width, a.canvas.ctx.stroke()), a.canvas.ctx.fill()
        }, a.fn.particlesCreate = function () {
            for (var e = 0; e < a.particles.number.value; e++) a.particles.array.push(new a.fn.particle(a.particles.color, a.particles.opacity.value))
        }, a.fn.particlesUpdate = function () {
            for (var e = 0; e < a.particles.array.length; e++) {
                var i = a.particles.array[e];
                if (a.particles.move.enable) {
                    var t = a.particles.move.speed / 2;
                    i.x += i.vx * t, i.y += i.vy * t
                }
                if (a.particles.opacity.anim.enable && (!0 == i.opacity_status ? (i.opacity >= a.particles.opacity.value && (i.opacity_status = !1), i.opacity += i.vo) : (i.opacity <= a.particles.opacity.anim.opacity_min && (i.opacity_status = !0), i.opacity -= i.vo), i.opacity < 0 && (i.opacity = 0)), a.particles.size.anim.enable && (!0 == i.size_status ? (i.radius >= a.particles.size.value && (i.size_status = !1), i.radius += i.vs) : (i.radius <= a.particles.size.anim.size_min && (i.size_status = !0), i.radius -= i.vs), i.radius < 0 && (i.radius = 0)), "bounce" == a.particles.move.out_mode) var s = {
                    x_left: i.radius,
                    x_right: a.canvas.w,
                    y_top: i.radius,
                    y_bottom: a.canvas.h
                }; else var s = {
                    x_left: -i.radius,
                    x_right: a.canvas.w + i.radius,
                    y_top: -i.radius,
                    y_bottom: a.canvas.h + i.radius
                };
                if (i.x - i.radius > a.canvas.w ? (i.x = s.x_left, i.y = Math.random() * a.canvas.h) : i.x + i.radius < 0 && (i.x = s.x_right, i.y = Math.random() * a.canvas.h), i.y - i.radius > a.canvas.h ? (i.y = s.y_top, i.x = Math.random() * a.canvas.w) : i.y + i.radius < 0 && (i.y = s.y_bottom, i.x = Math.random() * a.canvas.w), "bounce" === a.particles.move.out_mode && (i.x + i.radius > a.canvas.w ? i.vx = -i.vx : i.x - i.radius < 0 && (i.vx = -i.vx), i.y + i.radius > a.canvas.h ? i.vy = -i.vy : i.y - i.radius < 0 && (i.vy = -i.vy)), isInArray("grab", a.interactivity.events.onhover.mode) && a.fn.modes.grabParticle(i), (isInArray("bubble", a.interactivity.events.onhover.mode) || isInArray("bubble", a.interactivity.events.onclick.mode)) && a.fn.modes.bubbleParticle(i), (isInArray("repulse", a.interactivity.events.onhover.mode) || isInArray("repulse", a.interactivity.events.onclick.mode)) && a.fn.modes.repulseParticle(i), a.particles.line_linked.enable || a.particles.move.attract.enable) for (var r = e + 1; r < a.particles.array.length; r++) {
                    var n = a.particles.array[r];
                    a.particles.line_linked.enable && a.fn.interact.linkParticles(i, n), a.particles.move.attract.enable && a.fn.interact.attractParticles(i, n), a.particles.move.bounce && a.fn.interact.bounceParticles(i, n)
                }
            }
        }, a.fn.particlesDraw = function () {
            a.canvas.ctx.clearRect(0, 0, a.canvas.w, a.canvas.h), a.fn.particlesUpdate();
            for (var e = 0; e < a.particles.array.length; e++) a.particles.array[e].draw()
        }, a.fn.particlesEmpty = function () {
            a.particles.array = []
        }, a.fn.particlesRefresh = function () {
            cancelRequestAnimFrame(a.fn.checkAnimFrame), cancelRequestAnimFrame(a.fn.drawAnimFrame), a.tmp.source_svg = void 0, a.tmp.img_obj = void 0, a.tmp.count_svg = 0, a.fn.particlesEmpty(), a.fn.canvasClear(), a.fn.vendors.start()
        }, a.fn.interact.linkParticles = function (e, i) {
            var t = e.x - i.x, s = e.y - i.y, r = Math.sqrt(t * t + s * s);
            if (r <= a.particles.line_linked.distance) {
                var n = a.particles.line_linked.opacity - r / (1 / a.particles.line_linked.opacity) / a.particles.line_linked.distance;
                if (n > 0) {
                    var c = a.particles.line_linked.color_rgb_line;
                    a.canvas.ctx.strokeStyle = "rgba(" + c.r + "," + c.g + "," + c.b + "," + n + ")", a.canvas.ctx.lineWidth = a.particles.line_linked.width, a.canvas.ctx.beginPath(), a.canvas.ctx.moveTo(e.x, e.y), a.canvas.ctx.lineTo(i.x, i.y), a.canvas.ctx.stroke(), a.canvas.ctx.closePath()
                }
            }
        }, a.fn.interact.attractParticles = function (e, i) {
            var t = e.x - i.x, s = e.y - i.y;
            if (Math.sqrt(t * t + s * s) <= a.particles.line_linked.distance) {
                var r = t / (1e3 * a.particles.move.attract.rotateX), n = s / (1e3 * a.particles.move.attract.rotateY);
                e.vx -= r, e.vy -= n, i.vx += r, i.vy += n
            }
        }, a.fn.interact.bounceParticles = function (e, i) {
            var t = e.x - i.x, a = e.y - i.y;
            Math.sqrt(t * t + a * a) <= e.radius + i.radius && (e.vx = -e.vx, e.vy = -e.vy, i.vx = -i.vx, i.vy = -i.vy)
        }, a.fn.modes.pushParticles = function (e, i) {
            a.tmp.pushing = !0;
            for (var t = 0; t < e; t++) a.particles.array.push(new a.fn.particle(a.particles.color, a.particles.opacity.value, {
                x: i ? i.pos_x : Math.random() * a.canvas.w,
                y: i ? i.pos_y : Math.random() * a.canvas.h
            })), t == e - 1 && (a.particles.move.enable || a.fn.particlesDraw(), a.tmp.pushing = !1)
        }, a.fn.modes.removeParticles = function (e) {
            a.particles.array.splice(0, e), a.particles.move.enable || a.fn.particlesDraw()
        }, a.fn.modes.bubbleParticle = function (e) {
            if (a.interactivity.events.onhover.enable && isInArray("bubble", a.interactivity.events.onhover.mode)) {
                var i = e.x - a.interactivity.mouse.pos_x, t = e.y - a.interactivity.mouse.pos_y,
                    s = Math.sqrt(i * i + t * t), r = 1 - s / a.interactivity.modes.bubble.distance;

                function n() {
                    e.opacity_bubble = e.opacity, e.radius_bubble = e.radius
                }

                if (s <= a.interactivity.modes.bubble.distance) {
                    if (r >= 0 && "mousemove" == a.interactivity.status) {
                        if (a.interactivity.modes.bubble.size != a.particles.size.value) {
                            if (a.interactivity.modes.bubble.size > a.particles.size.value) {
                                var c = e.radius + a.interactivity.modes.bubble.size * r;
                                c >= 0 && (e.radius_bubble = c)
                            } else {
                                var o = e.radius - a.interactivity.modes.bubble.size, c = e.radius - o * r;
                                c > 0 ? e.radius_bubble = c : e.radius_bubble = 0
                            }
                        }
                        if (a.interactivity.modes.bubble.opacity != a.particles.opacity.value) {
                            if (a.interactivity.modes.bubble.opacity > a.particles.opacity.value) {
                                var l = a.interactivity.modes.bubble.opacity * r;
                                l > e.opacity && l <= a.interactivity.modes.bubble.opacity && (e.opacity_bubble = l)
                            } else {
                                var l = e.opacity - (a.particles.opacity.value - a.interactivity.modes.bubble.opacity) * r;
                                l < e.opacity && l >= a.interactivity.modes.bubble.opacity && (e.opacity_bubble = l)
                            }
                        }
                    }
                } else n();
                "mouseleave" == a.interactivity.status && n()
            } else if (a.interactivity.events.onclick.enable && isInArray("bubble", a.interactivity.events.onclick.mode)) {
                if (a.tmp.bubble_clicking) {
                    var i = e.x - a.interactivity.mouse.click_pos_x, t = e.y - a.interactivity.mouse.click_pos_y,
                        s = Math.sqrt(i * i + t * t),
                        v = (new Date().getTime() - a.interactivity.mouse.click_time) / 1e3;
                    v > a.interactivity.modes.bubble.duration && (a.tmp.bubble_duration_end = !0), v > 2 * a.interactivity.modes.bubble.duration && (a.tmp.bubble_clicking = !1, a.tmp.bubble_duration_end = !1)
                }

                function p(i, t, r, n, c) {
                    if (i != t) {
                        if (a.tmp.bubble_duration_end) {
                            if (void 0 != r) {
                                var o = n - v * (n - i) / a.interactivity.modes.bubble.duration;
                                p = i + (i - o), "size" == c && (e.radius_bubble = p), "opacity" == c && (e.opacity_bubble = p)
                            }
                        } else if (s <= a.interactivity.modes.bubble.distance) {
                            if (void 0 != r) var l = r; else var l = n;
                            if (l != i) {
                                var p = n - v * (n - i) / a.interactivity.modes.bubble.duration;
                                "size" == c && (e.radius_bubble = p), "opacity" == c && (e.opacity_bubble = p)
                            }
                        } else "size" == c && (e.radius_bubble = void 0), "opacity" == c && (e.opacity_bubble = void 0)
                    }
                }

                a.tmp.bubble_clicking && (p(a.interactivity.modes.bubble.size, a.particles.size.value, e.radius_bubble, e.radius, "size"), p(a.interactivity.modes.bubble.opacity, a.particles.opacity.value, e.opacity_bubble, e.opacity, "opacity"))
            }
        }, a.fn.modes.repulseParticle = function (e) {
            if (a.interactivity.events.onhover.enable && isInArray("repulse", a.interactivity.events.onhover.mode) && "mousemove" == a.interactivity.status) {
                var i = e.x - a.interactivity.mouse.pos_x, t = e.y - a.interactivity.mouse.pos_y,
                    s = Math.sqrt(i * i + t * t), r = {x: i / s, y: t / s}, n = a.interactivity.modes.repulse.distance,
                    c = clamp(1 / n * (-1 * Math.pow(s / n, 2) + 1) * n * 100, 0, 50),
                    o = {x: e.x + r.x * c, y: e.y + r.y * c};
                "bounce" == a.particles.move.out_mode ? (o.x - e.radius > 0 && o.x + e.radius < a.canvas.w && (e.x = o.x), o.y - e.radius > 0 && o.y + e.radius < a.canvas.h && (e.y = o.y)) : (e.x = o.x, e.y = o.y)
            } else if (a.interactivity.events.onclick.enable && isInArray("repulse", a.interactivity.events.onclick.mode)) {
                if (a.tmp.repulse_finish || (a.tmp.repulse_count++, a.tmp.repulse_count != a.particles.array.length || (a.tmp.repulse_finish = !0)), a.tmp.repulse_clicking) {
                    var n = Math.pow(a.interactivity.modes.repulse.distance / 6, 3),
                        l = a.interactivity.mouse.click_pos_x - e.x, v = a.interactivity.mouse.click_pos_y - e.y,
                        p = l * l + v * v, d = -n / p * 1;
                    p <= n && function i() {
                        var t = Math.atan2(v, l);
                        if (e.vx = d * Math.cos(t), e.vy = d * Math.sin(t), "bounce" == a.particles.move.out_mode) {
                            var s = {x: e.x + e.vx, y: e.y + e.vy};
                            s.x + e.radius > a.canvas.w ? e.vx = -e.vx : s.x - e.radius < 0 && (e.vx = -e.vx), s.y + e.radius > a.canvas.h ? e.vy = -e.vy : s.y - e.radius < 0 && (e.vy = -e.vy)
                        }
                    }()
                } else !1 == a.tmp.repulse_clicking && (e.vx = e.vx_i, e.vy = e.vy_i)
            }
        }, a.fn.modes.grabParticle = function (e) {
            if (a.interactivity.events.onhover.enable && "mousemove" == a.interactivity.status) {
                var i = e.x - a.interactivity.mouse.pos_x, t = e.y - a.interactivity.mouse.pos_y,
                    s = Math.sqrt(i * i + t * t);
                if (s <= a.interactivity.modes.grab.distance) {
                    var r = a.interactivity.modes.grab.line_linked.opacity - s / (1 / a.interactivity.modes.grab.line_linked.opacity) / a.interactivity.modes.grab.distance;
                    if (r > 0) {
                        var n = a.particles.line_linked.color_rgb_line;
                        a.canvas.ctx.strokeStyle = "rgba(" + n.r + "," + n.g + "," + n.b + "," + r + ")", a.canvas.ctx.lineWidth = a.particles.line_linked.width, a.canvas.ctx.beginPath(), a.canvas.ctx.moveTo(e.x, e.y), a.canvas.ctx.lineTo(a.interactivity.mouse.pos_x, a.interactivity.mouse.pos_y), a.canvas.ctx.stroke(), a.canvas.ctx.closePath()
                    }
                }
            }
        }, a.fn.vendors.eventsListeners = function () {
            "window" == a.interactivity.detect_on ? a.interactivity.el = window : a.interactivity.el = a.canvas.el, (a.interactivity.events.onhover.enable || a.interactivity.events.onclick.enable) && (a.interactivity.el.addEventListener("mousemove", function (e) {
                if (a.interactivity.el == window) var i = e.clientX, t = e.clientY; else var i = e.offsetX || e.clientX,
                    t = e.offsetY || e.clientY;
                a.interactivity.mouse.pos_x = i, a.interactivity.mouse.pos_y = t, a.tmp.retina && (a.interactivity.mouse.pos_x *= a.canvas.pxratio, a.interactivity.mouse.pos_y *= a.canvas.pxratio), a.interactivity.status = "mousemove"
            }), a.interactivity.el.addEventListener("mouseleave", function (e) {
                a.interactivity.mouse.pos_x = null, a.interactivity.mouse.pos_y = null, a.interactivity.status = "mouseleave"
            })), a.interactivity.events.onclick.enable && a.interactivity.el.addEventListener("click", function () {
                if (a.interactivity.mouse.click_pos_x = a.interactivity.mouse.pos_x, a.interactivity.mouse.click_pos_y = a.interactivity.mouse.pos_y, a.interactivity.mouse.click_time = new Date().getTime(), a.interactivity.events.onclick.enable) switch (a.interactivity.events.onclick.mode) {
                    case"push":
                        a.particles.move.enable ? a.fn.modes.pushParticles(a.interactivity.modes.push.particles_nb, a.interactivity.mouse) : 1 == a.interactivity.modes.push.particles_nb ? a.fn.modes.pushParticles(a.interactivity.modes.push.particles_nb, a.interactivity.mouse) : a.interactivity.modes.push.particles_nb > 1 && a.fn.modes.pushParticles(a.interactivity.modes.push.particles_nb);
                        break;
                    case"remove":
                        a.fn.modes.removeParticles(a.interactivity.modes.remove.particles_nb);
                        break;
                    case"bubble":
                        a.tmp.bubble_clicking = !0;
                        break;
                    case"repulse":
                        a.tmp.repulse_clicking = !0, a.tmp.repulse_count = 0, a.tmp.repulse_finish = !1, setTimeout(function () {
                            a.tmp.repulse_clicking = !1
                        }, 1e3 * a.interactivity.modes.repulse.duration)
                }
            })
        }, a.fn.vendors.densityAutoParticles = function () {
            if (a.particles.number.density.enable) {
                var e = a.canvas.el.width * a.canvas.el.height / 1e3;
                a.tmp.retina && (e /= 2 * a.canvas.pxratio);
                var i = e * a.particles.number.value / a.particles.number.density.value_area,
                    t = a.particles.array.length - i;
                t < 0 ? a.fn.modes.pushParticles(Math.abs(t)) : a.fn.modes.removeParticles(t)
            }
        }, a.fn.vendors.checkOverlap = function (e, i) {
            for (var t = 0; t < a.particles.array.length; t++) {
                var s = a.particles.array[t], r = e.x - s.x, n = e.y - s.y;
                Math.sqrt(r * r + n * n) <= e.radius + s.radius && (e.x = i ? i.x : Math.random() * a.canvas.w, e.y = i ? i.y : Math.random() * a.canvas.h, a.fn.vendors.checkOverlap(e))
            }
        }, a.fn.vendors.createSvgImg = function (e) {
            var i = a.tmp.source_svg.replace(/#([0-9A-F]{3,6})/gi, function (i, t, a, s) {
                    if (e.color.rgb) var r = "rgba(" + e.color.rgb.r + "," + e.color.rgb.g + "," + e.color.rgb.b + "," + e.opacity + ")"; else var r = "hsla(" + e.color.hsl.h + "," + e.color.hsl.s + "%," + e.color.hsl.l + "%," + e.opacity + ")";
                    return r
                }), t = new Blob([i], {type: "image/svg+xml;charset=utf-8"}), s = window.URL || window.webkitURL || window,
                r = s.createObjectURL(t), n = new Image;
            n.addEventListener("load", function () {
                e.img.obj = n, e.img.loaded = !0, s.revokeObjectURL(r), a.tmp.count_svg++
            }), n.src = r
        }, a.fn.vendors.destroypJS = function () {
            cancelAnimationFrame(a.fn.drawAnimFrame), t.remove(), pJSDom = null
        }, a.fn.vendors.drawShape = function (e, i, t, a, s, r) {
            var n = s * r, c = s / r, o = Math.PI - Math.PI * (180 * (c - 2) / c) / 180;
            e.save(), e.beginPath(), e.translate(i, t), e.moveTo(0, 0);
            for (var l = 0; l < n; l++) e.lineTo(a, 0), e.translate(a, 0), e.rotate(o);
            e.fill(), e.restore()
        }, a.fn.vendors.exportImg = function () {
            window.open(a.canvas.el.toDataURL("image/png"), "_blank")
        }, a.fn.vendors.loadImg = function (e) {
            if (a.tmp.img_error = void 0, "" != a.particles.shape.image.src) {
                if ("svg" == e) {
                    var i = new XMLHttpRequest;
                    i.open("GET", a.particles.shape.image.src), i.onreadystatechange = function (e) {
                        4 == i.readyState && (200 == i.status ? (a.tmp.source_svg = e.currentTarget.response, a.fn.vendors.checkBeforeDraw()) : (console.log("Error pJS - Image not found"), a.tmp.img_error = !0))
                    }, i.send()
                } else {
                    var t = new Image;
                    t.addEventListener("load", function () {
                        a.tmp.img_obj = t, a.fn.vendors.checkBeforeDraw()
                    }), t.src = a.particles.shape.image.src
                }
            } else console.log("Error pJS - No image.src"), a.tmp.img_error = !0
        }, a.fn.vendors.draw = function () {
            "image" == a.particles.shape.type ? "svg" == a.tmp.img_type ? a.tmp.count_svg >= a.particles.number.value ? (a.fn.particlesDraw(), a.particles.move.enable ? a.fn.drawAnimFrame = requestAnimFrame(a.fn.vendors.draw) : cancelRequestAnimFrame(a.fn.drawAnimFrame)) : a.tmp.img_error || (a.fn.drawAnimFrame = requestAnimFrame(a.fn.vendors.draw)) : void 0 != a.tmp.img_obj ? (a.fn.particlesDraw(), a.particles.move.enable ? a.fn.drawAnimFrame = requestAnimFrame(a.fn.vendors.draw) : cancelRequestAnimFrame(a.fn.drawAnimFrame)) : a.tmp.img_error || (a.fn.drawAnimFrame = requestAnimFrame(a.fn.vendors.draw)) : (a.fn.particlesDraw(), a.particles.move.enable ? a.fn.drawAnimFrame = requestAnimFrame(a.fn.vendors.draw) : cancelRequestAnimFrame(a.fn.drawAnimFrame))
        }, a.fn.vendors.checkBeforeDraw = function () {
            "image" == a.particles.shape.type ? "svg" == a.tmp.img_type && void 0 == a.tmp.source_svg ? a.tmp.checkAnimFrame = requestAnimFrame(check) : (cancelRequestAnimFrame(a.tmp.checkAnimFrame), a.tmp.img_error || (a.fn.vendors.init(), a.fn.vendors.draw())) : (a.fn.vendors.init(), a.fn.vendors.draw())
        }, a.fn.vendors.init = function () {
            a.fn.retinaInit(), a.fn.canvasInit(), a.fn.canvasSize(), a.fn.canvasPaint(), a.fn.particlesCreate(), a.fn.vendors.densityAutoParticles(), a.particles.line_linked.color_rgb_line = hexToRgb(a.particles.line_linked.color)
        }, a.fn.vendors.start = function () {
            isInArray("image", a.particles.shape.type) ? (a.tmp.img_type = a.particles.shape.image.src.substr(a.particles.shape.image.src.length - 3), a.fn.vendors.loadImg(a.tmp.img_type)) : a.fn.vendors.checkBeforeDraw()
        }, a.fn.vendors.eventsListeners(), a.fn.vendors.start()
    };

    function hexToRgb(e) {
        e = e.replace(/^#?([a-f\d])([a-f\d])([a-f\d])$/i, function (e, i, t, a) {
            return i + i + t + t + a + a
        });
        var i = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);
        return i ? {r: parseInt(i[1], 16), g: parseInt(i[2], 16), b: parseInt(i[3], 16)} : null
    }

    function clamp(e, i, t) {
        return Math.min(Math.max(e, i), t)
    }

    function isInArray(e, i) {
        return i.indexOf(e) > -1
    }

    Object.deepExtend = function (e, i) {
        for (var t in i) i[t] && i[t].constructor && i[t].constructor === Object ? (e[t] = e[t] || {}, arguments.callee(e[t], i[t])) : e[t] = i[t];
        return e
    }, window.requestAnimFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (e) {
        window.setTimeout(e, 1e3 / 60)
    }, window.cancelRequestAnimFrame = window.cancelAnimationFrame || window.webkitCancelRequestAnimationFrame || window.mozCancelRequestAnimationFrame || window.oCancelRequestAnimationFrame || window.msCancelRequestAnimationFrame || clearTimeout, window.pJSDom = [], window.particlesJS = function (e, i) {
        "string" != typeof e && (i = e, e = "particles-js"), e || (e = "particles-js");
        var t = document.getElementById(e), a = "particles-js-canvas-el", s = t.getElementsByClassName(a);
        if (s.length) for (; s.length > 0;) t.removeChild(s[0]);
        var r = document.createElement("canvas");
        r.className = a, r.style.width = "100%", r.style.height = "100%", null != document.getElementById(e).appendChild(r) && pJSDom.push(new pJS(e, i))
    }, window.particlesJS.load = function (e, i, t) {
        var a = new XMLHttpRequest;
        a.open("GET", i), a.onreadystatechange = function (i) {
            if (4 == a.readyState) {
                if (200 == a.status) {
                    var s = JSON.parse(i.currentTarget.response);
                    window.particlesJS(e, s), t && t()
                } else console.log("Error pJS - XMLHttpRequest status: " + a.status), console.log("Error pJS - File config not found")
            }
        }, a.send()
    };
    particlesJS("particles-js", {
        particles: {
            number: {value: 60, density: {enable: !0, value_area: 1e3}},
            color: {value: "#ffffff"},
            shape: {
                type: "circle",
                stroke: {width: 0, color: "#000000"},
                polygon: {nb_sides: 5},
                image: {src: "img/github.svg", width: 100, height: 100}
            },
            opacity: {value: .5, random: !1, anim: {enable: !1, speed: 1, opacity_min: .1, sync: !1}},
            size: {value: 5, random: !0, anim: {enable: !1, speed: 30, size_min: .1, sync: !1}},
            line_linked: {enable: !0, distance: 200, color: "#ffffff", opacity: .4, width: 1},
            move: {
                enable: !0,
                speed: 6,
                direction: "none",
                random: !1,
                straight: !1,
                out_mode: "out",
                attract: {enable: !1, rotateX: 600, rotateY: 1200}
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {onhover: {enable: !0, mode: "repulse"}, onclick: {enable: !0, mode: "push"}, resize: !0},
            modes: {
                grab: {distance: 400, line_linked: {opacity: 1}},
                bubble: {distance: 400, size: 40, duration: 2, opacity: 8, speed: 3},
                repulse: {distance: 200},
                push: {particles_nb: 4},
                remove: {particles_nb: 2}
            }
        },
        retina_detect: !0,
        config_demo: {
            hide_card: !1,
            background_color: "#b61924",
            background_image: "",
            background_position: "50% 50%",
            background_repeat: "no-repeat",
            background_size: "cover"
        }
    });
</script>
</body>
