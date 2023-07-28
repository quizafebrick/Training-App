<div style="margin: 0; padding: 0; background-color: #f1f1f1;">
    {{-- * OUTER CONTAINER WITH 100% WIDTH * --}}
    <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout: fixed;">
        <tr>
            <td align="center" valign="top" style="padding: 2rem 1.5rem;">
                {{-- * CENTERED CONTENT * --}}
                <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0"
                    style="table-layout: fixed;">
                    <tr>
                        <td align="center" style="background-color: #111827; border-radius: 0.5rem;">
                            <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="padding: 1.5rem;">
                                        <div
                                            style="font-size: 1.5rem; line-height: 2rem; font-weight: bold; color: white;">
                                            {{ $mailData['title'] }}
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center" style="padding: 1.5rem; background-color: #e2e8f0"
                                        class="text-2xl">
                                        <div class="sentence-code"
                                            style="text-align: center;
                                            font-weight: 600;
                                            color:black;
                                            font-size: 1.5rem;
                                            line-height: 2rem">
                                            Here's your Code:

                                            <span class="email-body"
                                                style="text-decoration: underline;
                                                font-weight: 700;
                                                font-size: 1.875rem;
                                                line-height: 2.25rem">
                                                {{ $mailData['body'] }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="rounded rounde">
                                    <td align="center"
                                        style="background-color: #e2e8f0; color: black; border-bottom-right-radius: 0.5rem;
                                        border-bottom-left-radius: 0.5rem">
                                        <p style="font-weight: 600; font-size: 0.875rem; color: #b91c1c;">
                                            <span style="font-weight: 700;">NOTE: &nbsp;</span>
                                            Do not give your verification code, or else someone might access your
                                            Student Account Portal.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- * SYSTEM GENERATED EMAIL NOTE * --}}
    <div
        style="color: #475569; font-weight: 600; font-style: italic; font-size: 0.875rem; text-align: center; padding-bottom: 0.75rem">
        */ This is a system-generated email; you don't need to give your feedback to us. Thank you! */
    </div>
</div>
