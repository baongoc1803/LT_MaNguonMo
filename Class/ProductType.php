<?php
//modified by Mewburn Projects Pty Ltd

use __IDE\ArrayShape;
use __IDE\LanguageLevelTypeAware;
use __IDE\StubsElementAvailable;
use __IDE\ReturnTypeContract as TypeContract;
use __IDE\Pure;

/**
 * Query language and locale information
 * @link https://php.net/manual/en/function.nl-langinfo.php
 * @param int $item <p>
 * item may be an integer value of the element or the
 * constant name of the element. The following is a list of constant names
 * for item that may be used and their description.
 * Some of these constants may not be defined or hold no value for certain
 * locales.</p>
 * nl_langinfo Constants
 * <table>
 * <tr valign="top">
 * <td>Constant</td>
 * <td>Description</td>
 * </tr>
 * <tr colspan="2" valign="top" bgcolor="silver">
 * <td >LC_TIME Category Constants</td>
 * </tr>
 * <tr valign="top">
 * <td>ABDAY_(1-7)</td>
 * <td>Abbreviated name of n-th day of the week.</td>
 * </tr>
 * <tr valign="top">
 * <td>DAY_(1-7)</td>
 * <td>Name of the n-th day of the week (DAY_1 = Sunday).</td>
 * </tr>
 * <tr valign="top">
 * <td>ABMON_(1-12)</td>
 * <td>Abbreviated name of the n-th month of the year.</td>
 * </tr>
 * <tr valign="top">
 * <td>MON_(1-12)</td>
 * <td>Name of the n-th month of the year.</td>
 * </tr>
 * <tr valign="top">
 * <td>AM_STR</td>
 * <td>String for Ante meridian.</td>
 * </tr>
 * <tr valign="top">
 * <td>PM_STR</td>
 * <td>String for Post meridian.</td>
 * </tr>
 * <tr valign="top">
 * <td>D_T_FMT</td>
 * <td>String that can be used as the format string for strftime to represent time and date.</td>
 * </tr>
 * <tr valign="top">
 * <td>D_FMT</td>
 * <td>String that can be used as the format s