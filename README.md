# vin-decoder

[![Build Status](https://travis-ci.org/michalwaskiw/vin-decoder.svg?branch=master)](https://travis-ci.org/michalwaskiw/vin-decoder)

# What is this?
vin-decoder is a small package to validate and decode Vehicle Identification Number (known as VIN).

# Usage

<code>
$vin = "1M8GDM9AXKP042788";
</code>
<br>
<code>
$decoder->isValid($vin); //returns true if VIN is valid and false if it's not.
</code>
